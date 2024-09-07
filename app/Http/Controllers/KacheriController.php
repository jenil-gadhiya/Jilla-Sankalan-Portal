<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Kacheri;
use App\Models\Department;
use App\Models\DepartmentKacheri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KacheriController extends Controller
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
        $departments = Department::all();
        $other_record_in_department = Department::where('department_name','=','other')->first();
        return view('admin.kacheri.add-kacheri',['departments' => $departments, 'other_record_in_department' => $other_record_in_department]);
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
            'kacheri_name' => ['required','unique:kacheris'],
        ]);
        
        $depts = $request->dept;

        //Checks for array is empty or not
        if($depts != null)
        {
            $kacheri = new Kacheri;
        
            //This Store the kacheri name into the kacheri table
            $kacheri->kacheri_name = $request->kacheri_name;
            $kacheri->save();
            
            //Find the kacheri that entered by user
            $kacheriID = new Kacheri;   
            $kacheriID = Kacheri::where('kacheri_name','=',$request->kacheri_name)->first();

            //This Store the kacheri_id and department_id into the department_kacheris table
            foreach($depts as $dep)
            {
                $departmentkacheri = new DepartmentKacheri;
                $departmentkacheri->kacheri_id = $kacheriID->id;
                $departmentkacheri->department_id = $dep;
                $departmentkacheri->save();
            }
            
            // This Display Message IF kacheri Successfully Added
            Alert::success('Successfully Added','Kacheri has been Successfully Added.');

            return redirect('/user/details');

        }
        //If array is empty then alert message will be displayed
        else
        {
            // $departmentkacheri = new DepartmentKacheri;
            // $departmentkacheri->kacheri_id = $kacheriID->id;
            // $departmentkacheri->department_id = 5;
            // $departmentkacheri->save();

            // This Display Message IF Department is not selected
            Alert::warning('Warning !!','Minimum 1 department should be selected');
        
            return redirect('/kacheri/add');
        }

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
}
