<?php

namespace App\Http\Controllers\Auth;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use App\Models\DepartmentKacheri;
use App\Models\DepartmentKacheriUser;
use App\Models\Department;
use App\Models\Designation;
use App\Models\DesignationUser;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SetPassword;
use Illuminate\Support\HtmlString;
use App\Notifications\PasswordReset;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware(['auth','isadmin']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_type' => ['required','string'],
            'kacheri_id' => ['required'],
            'dept_id' => ['required'],
            'designation_user_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mobile_number' => ['required','max:10','min:10'],
            'address' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Store the User
        $user = User::create([
            'user_type' => $data['user_type'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make(Str::random(10)),
            'mobile_number' => $data['mobile_number'],
            'address' => $data['address'],
        ]);

        // dd($user);
        // This will Find the User id That will created by above method
        // $user = User::where('email', '=', $data['email'])->first('id');

        // This will store the user_id of created user with selected department and kacheri into DepartmentKacheriUser 
        DepartmentKacheriUser::create([
            'user_id' => $user->id,
            'department_kacheri_id' => $data['dept_id'],
        ]);

        // This will store the user_id of created user with selected designation into DesignationUser 
        DesignationUser::create([
            'user_id' => $user->id,
            'designation_id' => $data['designation_user_id'],
        ]);


        $create_token = Str::random(60);
        //password_resets
        $row = DB::table('password_resets')->where('email', $data['email'])->first();
        if ($row) {
            DB::table('password_resets')
                ->where('email', $data['email'])
                ->update(['token' =>  Hash::make($create_token), 'created_at' => Carbon::now()]);
        } else {
            //Create Password Reset Token
            DB::table('password_resets')->insert([
                'email' => $data['email'],
                'token' => Hash::make($create_token),
                'created_at' => Carbon::now()
            ]);
        }
        // $this->email = $data['email'];
        $tokenData['token'] = $create_token;
        $tokenData['email'] = $data['email'];
        $tokenData['first_name'] = $data['name'];
        $tokenData['user_name'] = $data['email'];


        // $this->sendPasswordResetNotification($tokenData);
        $user->notify(new PasswordReset($tokenData));


        // This Display message if User Successfuly Added
        Alert::success('Successfully Added','User has been Successfully Added.');

    }

    public function fetchKacheri(Request $request)
    {
        // $data['departments'] = DepartmentKacheri::where("kacheri_id", $request->kacheri_id)->get(["id", "department_id"]);
        
        // This Will Return the Department_kacheri id with specific users record and the department_name accorgingly selected kacheri
        $data['departments'] = Department::join('department_kacheris', 'departments.id', '=', 'department_kacheris.department_id')
                                        ->where("department_kacheris.kacheri_id", $request->kacheri_id)
                                        ->get(['department_kacheris.id', 'departments.department_name']);
        return response()->json($data);
    }

    public function sendPasswordResetNotification($token)
    {
        // dd($token);
        // if (config('mail.username') != '' && config('mail.password') != '') {
        $this->notify(new PasswordReset($token));
        // }
    }
}
