<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kacheri;
use App\Models\Department;
use App\Models\DepartmentKacheri;
use App\Models\DepartmentKacheriUser;
use App\Models\Designation;
use App\Models\DesignationUser;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(6);

        // This will get the user_id, department_name, kacheri_name
        $getUserId_KacheriName_DepartmentName = DepartmentKacheriUser::join('users', 'department_kacheri_users.user_id', '=', 'users.id')
                                                    ->join('department_kacheris','department_kacheris.id','=','department_kacheri_users.department_kacheri_id')
                                                    ->join('departments','departments.id','=','department_kacheris.department_id')
                                                    ->join('kacheris','kacheris.id','=','department_kacheris.kacheri_id')
                                                    ->get(['department_kacheri_users.user_id','departments.department_name','kacheris.kacheri_name']);
        
        // This will get the user_id, designation_name
        $getUserId_DesignationName = DesignationUser::join('users', 'designation_users.user_id', '=', 'users.id')
                                                    ->join('designations','designations.id','=','designation_users.designation_id')
                                                    ->get(['designation_users.user_id','designations.designation_name']);
        
        // dd($getUserId_KacheriName_DepartmentName);

        //Pass All users, with its kacheri name, department name, with user id for display into the file
        return view('admin.user.user-detail',['users'=>$users,'count'=>0,'getUserId_KacheriName_DepartmentName'=>$getUserId_KacheriName_DepartmentName, 'getUserId_DesignationName' => $getUserId_DesignationName]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

        // Find the particular clicked user
        $user = User::find($id);

        // This will get the user_id, department_name, kacheri_name, kachri_id for that user
        $getUserId_KacheriName_DepartmentName = DepartmentKacheriUser::join('users', 'department_kacheri_users.user_id', '=', 'users.id')
                                                    ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                                    ->join('departments', 'departments.id', '=', 'department_kacheris.department_id')
                                                    ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                                    ->where('users.id', '=', $id)
                                                    ->first(['department_kacheri_users.user_id', 'department_kacheris.kacheri_id','departments.department_name', 'kacheris.kacheri_name']);
        
        
        // Find Department_kacheri id And department name
        $getDepartmentKachriIdAndDepartmentName = Department::join('department_kacheris', 'departments.id', '=', 'department_kacheris.department_id')
                                                    ->where("department_kacheris.kacheri_id", $getUserId_KacheriName_DepartmentName->kacheri_id)
                                                    ->get(['department_kacheris.id', 'departments.department_name']);

        // Find user_id, designation_id, designation_name
        $getUserId_DesignationName_DesignationId = DesignationUser::join('users', 'designation_users.user_id', '=', 'users.id')
                                                    ->join('designations','designations.id','=','designation_users.designation_id')
                                                    ->where('users.id', '=', $id)                                             
                                                    ->first(['designation_users.user_id','designations.designation_name','designations.id']);
                                                
        // dd($getUserId_DesignationName_DesignationId);
        return view('admin.user.edit-user', ['user' => $user, 'getUserId_KacheriName_DepartmentName' => $getUserId_KacheriName_DepartmentName, 'getDepartmentKachriIdAndDepartmentName' => $getDepartmentKachriIdAndDepartmentName, 'getUserId_DesignationName_DesignationId' => $getUserId_DesignationName_DesignationId]);

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

        $inputs = $request->validate([
            'user_type' => ['required','string'],
            'kacheri_id' => ['required'],
            'dept_id' => ['required'],
            'designation_user_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|max:255|unique:users,email,'.$id,
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile_number' => ['required', 'max:10', 'min:10'],
            'address' => ['required'],
        ]);

        // Find the particular clicked user
        $user = User::find($id);

        $user->user_type = $inputs['user_type'];
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        // $user->password = Hash::make($inputs['password']);
        $user->mobile_number = $inputs['mobile_number'];
        $user->address = $inputs['address'];
        $user->save();

        //Find DepartmentKacheriUser for the user
        $findDepartmentKacheri = DepartmentKacheriUser::where('user_id', '=', $id)->first();
        $findDepartmentKacheri->department_kacheri_id = $inputs['dept_id'];
        $findDepartmentKacheri->save();

        //Find DesignationUser for the user
        $findDesignationUser = DesignationUser::where('user_id', '=', $id)->first();
        $findDesignationUser->designation_id = $inputs['designation_user_id'];
        $findDesignationUser->save();

        Alert::success('Successfully Edited','User has been Successfully Edited.');

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->user_delete_id);
        User::find($request->user_delete_id)->delete();

        // This Display Message IF User Successfully Deleted

        Alert::success('Deleted','User has been Successfully Deleted.');
        // session()->flash('user-deleted', 'User has been deleted');
        return redirect('/user/details')->with('message', 'User Deleted Successfully');
    }
}
