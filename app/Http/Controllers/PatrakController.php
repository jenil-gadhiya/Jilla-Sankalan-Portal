<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrak;
use App\Models\ExpirePatrak;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class PatrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch All patraks
        $admin_patrak = Patrak::all();

        // Determine current month
        $month_name = Carbon::now()->format('F - Y');

        // Determine current date
        $today = Carbon::now()->format('Y-m-d');
        // dd($today);
        
        // Determine Authorize user patraks
        $user_patrak = ExpirePatrak::where('user_id',Auth::id())->where('start_date','<=',$today)->where('end_date','>=',$today)->get('patrak_id','user_id');

        // This Array contains value of sorted array patrak_id
        $sorted_patrak = [];
        foreach($user_patrak as $patrak)
        {
            $sorted_patrak[] = $patrak->patrak_id;
        }
        $sorted_patrak = collect($sorted_patrak)->sort()->toarray();
        // dd($sorted_patrak);

        if($sorted_patrak == null)
        {
            // This Display Message IF User have not permission To Fill Patrak
            Alert::warning('Warning !!','You have not permission to fill patrak');
        }
            
        return view('admin.patrak.index',['admin_patrak'=>$admin_patrak,'user_patrak'=>$user_patrak,'counter'=>1,'month'=>$month_name,'sorted_patrak'=>$sorted_patrak]);
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


    // //View Patrak Route
    // public function view_civil_authority_case_disposal()
    // {
    //     return view('admin.patrak.civil-authority-case-disposal');
    // }

    // public function view_departmental_investigation()
    // {
    //     return view('admin.patrak.departmental-investigation');
    // }

    // public function view_mpmla_pending_letters()
    // {
    //     return view('admin.patrak.mpmla-pending-letters');
    // }

    // public function view_rti_appeal()
    // {
    //     return view('admin.patrak.rti-appeal');
    // }

    // public function view_rti_application()
    // {
    //     return view('admin.patrak.rti-application');
    // }

    // public function view_information_of_pending_cases_for_pension()
    // {
    //     return view('admin.patrak.information-of-pending-cases-for-pension');
    // }

    // public function view_information_of_pending_recovery()
    // {
    //     return view('admin.patrak.information-of-pending-recovery');
    // }

    // public function view_information_of_pending_sheet()
    // {
    //     return view('admin.patrak.information-of-pending-sheet');
    // }

    // public function view_ag_audit_pending_para_information()
    // {
    //     return view('admin.patrak.ag-audit-pending-para-information');
    // }


    // //Add Patrak Route
    // public function add_civil_authority_case_disposal()
    // {
    //     return view('admin.patrak.add.civil-authority-case-disposal');
    // }

    // public function add_departmental_investigation()
    // {
    //     return view('admin.patrak.add.departmental-investigation');
    // }

    // public function add_mpmla_pending_letters()
    // {
    //     return view('admin.patrak.add.mpmla-pending-letters');
    // }

    // public function add_rti_appeal()
    // {
    //     return view('admin.patrak.add.rti-appeal');
    // }

    // public function add_rti_application()
    // {
    //     return view('admin.patrak.add.rti-application');
    // }

    // public function add_information_of_pending_cases_for_pension()
    // {
    //     return view('admin.patrak.add.information-of-pending-cases-for-pension');
    // }

    // public function add_information_of_pending_recovery()
    // {
    //     return view('admin.patrak.add.information-of-pending-recovery');
    // }

    // public function add_information_of_pending_sheet()
    // {
    //     return view('admin.patrak.add.information-of-pending-sheet');
    // }

    // public function add_ag_audit_pending_para_information()
    // {
    //     return view('admin.patrak.add.ag-audit-pending-para-information');
    // }
}
