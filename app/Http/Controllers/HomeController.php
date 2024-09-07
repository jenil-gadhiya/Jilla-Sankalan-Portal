<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ExpirePatrak;
use App\Models\DesignationUser;
use App\Models\Patrak;
use App\Models\DepartmentKacheriUser;
use App\Models\DepartmentKacheri;
use App\Models\Kacheri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Fetch Current_month with no duplication
        $fetchMonthYear = ExpirePatrak::select('current_month', DB::raw('count(*) as total'))
                                            ->groupBy('current_month')->get();

        // Determine current month name
        $month_name = Carbon::now()->format('F - Y'); 



        // Determine current date
        $today = Carbon::now()->format('Y-m-d');

        // If Filter is applied
        // $IdKacheri = $request->kacheri;
        // $month = $request->month;

        // Determine current month name
        $month_name = Carbon::now()->format('F - Y'); 

        // Check for user is admin or not
        if(Auth::user()->isAdmin())
        {
            // Get all Ptarak
            $patraks = Patrak::get();
            
            // Get Users
            $users = User::join('department_kacheri_users', 'users.id', '=', 'department_kacheri_users.user_id', )
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'users.id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->where('users.user_type','=','user')
                                ->select('users.*', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id')
                                ->paginate(10);

            // Get All patrak with kacheri, department, user
            $patrak_data = ExpirePatrak::join('users', 'users.id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->where('users.user_type','=','user')
                                ->where('expire_patraks.current_month','=',$month_name)
                                ->select('expire_patraks.*', 'users.name', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');
            // dd($users);
            
            // if($month != null) {
            //     // Get All data From Patrak with selected month
            //     $patrak_data = $patrak_data->where('expire_patraks.current_month', '=', $month);
            // }

            $patrak_data = $patrak_data->get();
            // dd($patrak_data);

            $expirePatrakData = [];
            $patraksAsUser = [];
            foreach($patrak_data as $data)
            {
                $expirePatrakData[$data->user_id][$data->patrak_id] = $data->status;
                $patraksAsUser[$data->user_id] = $data;
            }    
            // dd($patraksAsUser);
        }
        elseif(Auth::user()->isUser())
        {
            // Find Current Authorize user id
            $IdUser = Auth::id();

            // Get all Ptarak
            $patraks = ExpirePatrak::join('patraks','patraks.id','=','expire_patraks.patrak_id')
                                ->select('patraks.*')
                                ->where('expire_patraks.user_id','=',$IdUser)
                                ->where('expire_patraks.current_month','=',$month_name)
                                ->get();
            
            // Get Users
            $users = User::join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'users.id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'users.id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->where('users.id','=',$IdUser)
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('users.*', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id')
                                ->get();
                                

            // Get All patrak with kacheri, department, user
            $patrak_data = ExpirePatrak::join('users', 'users.id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->where('expire_patraks.user_id','=',$IdUser)
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->where('expire_patraks.current_month','=',$month_name)
                                ->select('expire_patraks.*', 'users.name', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');

            $patrak_data = $patrak_data->get();
            // dd($patrak_data);

            $expirePatrakData = [];
            $patraksAsUser = [];
            foreach($patrak_data as $data)
            {
                $expirePatrakData[$data->user_id][$data->patrak_id] = $data->status;
                $patraksAsUser[$data->user_id] = $data;
            }    
            // dd($patraksAsUser);
        }

        if(Auth::user()->isAdmin())
        {
            return view('admin.index',['fetchMonthYear'=>$fetchMonthYear, 'month_name'=>$month_name, 'patraks'=>$patraks, 'users' => $users, 'patrak_data' => $patrak_data, 'expirePatrakData' => $expirePatrakData, 'patraksAsUser'=>$patraksAsUser]);
        }
        else if(Auth::user()->isUser())
        {
            if($patraks->count() <= 0)
            {
                // This Display Message IF User have not permission To Fill Patrak
                Alert::warning('Warning !!','You have not permission to fill patrak');
            }
            return view('admin.user.index',['fetchMonthYear'=>$fetchMonthYear, 'month_name'=>$month_name, 'patraks'=>$patraks, 'users' => $users, 'patrak_data' => $patrak_data, 'expirePatrakData' => $expirePatrakData, 'patraksAsUser'=>$patraksAsUser]);
        }
    }

    // public function user_index()
    // {
    //     return view('admin.user.index');
    // }



    public function fetchdata(Request $request)
    {
        // return response()->json([
        //     'patrak_data' => $patrak_data,
        // ]);
    }
}
