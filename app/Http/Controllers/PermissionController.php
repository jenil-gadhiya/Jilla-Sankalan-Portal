<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartmentKacheri;
use App\Models\DepartmentKacheriUser;
use App\Models\Department;
use App\Models\User;
use App\Models\Patrak;
use App\Models\PatrakUser;
use App\Models\ExpirePatrak;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patraks = Patrak::all();
        return view('admin.user-permission')->with('patraks', $patraks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'kacheri_id' => 'required',
            'dept_id' => 'required',
            'user_id' => 'required',
        ]);

        // Check if patark is not selected
        $check_patrak_count = $request->patrak_name;
        if($check_patrak_count != null)
        {
            // This wii get if already user have permission
            $olddata = PatrakUser::where('user_id', $request->user_id)->pluck('patrak_id')->toArray();

            // Fetch All Patrak_id Which are selected
            $patraks = $request->patrak_name;

            // This is For Empty Patrak
            $delete_patrak = [];
            $new_patrak = [];

            // dd(array_diff($patraks,$olddata));
            // dd($patraks);

            // This will Check If old patrak is exist or not
            if (count($olddata) > 0) {
                // This will determine if patrak is unchecked or not
                $delete_patrak = array_diff($olddata, $patraks);

                // This will determine new if patrak is checked or not
                $new_patrak = array_diff($patraks, $olddata);
            } else {
                foreach ($patraks as $patrak) {
                    $today = Carbon::now();
                    $month_name = Carbon::now()->format('F - Y');
                    $lastDayofMonth = Carbon::parse($today)->endOfMonth()->toDateString();

                    // This will store data into patrak_users table
                    $patrakuser = new PatrakUser;
                    $patrakuser->user_id = $request->user_id;
                    $patrakuser->patrak_id = $patrak;
                    $patrakuser->save();

                    // This will store data into the expire_patraks table
                    $expire_patraks = new ExpirePatrak;
                    $expire_patraks->user_id = $request->user_id;
                    $expire_patraks->patrak_id = $patrak;
                    $expire_patraks->current_month = $month_name;
                    $expire_patraks->start_date = $today;
                    $expire_patraks->end_date = $lastDayofMonth;
                    $expire_patraks->save();
                }
            }
            // dd($delete_patrak);

            // check if old patrak is unchecked or not
            if (count($delete_patrak) > 0) {
                // This will delete unchecked patrak
                foreach ($delete_patrak as $delete)
                    $patrak_delete[] = PatrakUser::where('user_id', $request->user_id)->where('patrak_id', $delete)->delete();
            }

            // Checks if new patrak checked or not
            if (count($new_patrak) > 0) {
                foreach ($new_patrak as $patrak) {
                    $today = Carbon::now();
                    $month_name = Carbon::now()->format('F - Y');
                    $lastDayofMonth = Carbon::parse($today)->endOfMonth()->toDateString();

                    // This will store data into patrak_users table
                    $patrakuser = new PatrakUser;
                    $patrakuser->user_id = $request->user_id;
                    $patrakuser->patrak_id = $patrak;
                    $patrakuser->save();
                    
                    // Check for this patrak is already exist into the expire_patraks table
                    $old_expire_patrak = ExpirePatrak::where('user_id','=',$request->user_id)
                                                ->where('patrak_id','=',$patrak)
                                                ->where('current_month','=',$month_name)
                                                ->pluck('patrak_id')
                                                ->toArray();

                    if(count($old_expire_patrak) <= 0)
                    {
                        // This will store data into the expire_patraks table
                        $expire_patraks = new ExpirePatrak;
                        $expire_patraks->user_id = $request->user_id;
                        $expire_patraks->patrak_id = $patrak;
                        $expire_patraks->current_month = $month_name;
                        $expire_patraks->start_date = $today;
                        $expire_patraks->end_date = $lastDayofMonth;
                        $expire_patraks->save();
                    }
                }
            }
            // This Display Message IF kacheri Successfully Added
            Alert::success('Successfully Added','Patrak Permission has been Successfully Added.');
        }
        else
        {
            // This Display Message IF Patrak is not selected
            Alert::warning('Warning !!','Minimum 1 Patrak should be selected');
        }

        return redirect('/user/permission');   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetchKacheri(Request $request)
    {
        // This Will Return the Department_kacheri id with specific users record and the department_name accorgingly selected kacheri
        $data['departments'] = Department::join('department_kacheris', 'departments.id', '=', 'department_kacheris.department_id')
            ->where("department_kacheris.kacheri_id", $request->kacheri_id)
            ->get(['department_kacheris.id', 'departments.department_name']);
        return response()->json($data);
    }

    public function fetchDepartment(Request $request)
    {
        // This Will Return the user_id, department_kacheri_users id with specific users record and the user_name accordingly selected kacheri and Selected Department
        $data['users'] = User::join('department_kacheri_users', 'users.id', '=', 'department_kacheri_users.user_id')
            ->where("department_kacheri_users.department_kacheri_id", $request->dept_id)
            ->get(['department_kacheri_users.id', 'users.name', 'department_kacheri_users.user_id']);

        return response()->json($data);
    }

    public function fetchUser(Request $request)
    {
        // This will return selected partak_id for the dropdown selcted User
        $data = PatrakUser::where('user_id', $request->user_id)->pluck('patrak_id');
        return response()->json($data);
    }
}
