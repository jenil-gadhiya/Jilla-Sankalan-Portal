<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\MpmlaPendingLettersPatrak;
use App\Models\ExpirePatrak;
use App\Models\DesignationUser;
use App\Models\Patrak;
use App\Models\DepartmentKacheriUser;
use App\Models\DepartmentKacheri;
use App\Models\Kacheri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use mpdf;

class MpmlaPendingLettersPatrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch Current_month with no duplication
        $fetchMonthYear = ExpirePatrak::select('current_month', DB::raw('count(*) as total'))
                                            ->groupBy('current_month')
                                            ->orderBy('created_at')
                                            ->get();

        // Determine current month name
        $month_name = Carbon::now()->format('F - Y'); 

        // Fetch all Kachei
        $fetchKacheries = Kacheri::all();

        // Return view for show information
        return view('admin.patrak.mpmla-pending-letters', ['fetchMonthYear' => $fetchMonthYear, 'fetchKacheries' => $fetchKacheries, 'month_name' => $month_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Find User id
        $id_user = Auth::id();

        // Find Patrak_id
        $id_patrak = Patrak::where('patrak_name','MPMLA pending letters')->pluck('id');

        // Determine current month name
        $month_name = Carbon::now()->format('F - Y'); 

        // Find the Designation name
        $designation = DesignationUser::where('user_id',$id_user)
                            ->join('designations','designation_users.designation_id','designations.id')
                            ->first('designations.designation_name');

        // Find Expire Patrak id
        $id_expire_patrak = ExpirePatrak::where('user_id',$id_user)->where('patrak_id',$id_patrak)->where('current_month',$month_name)->value('id');
    
        // Check if Patrak is already filled or not
        $expire_patrak = ExpirePatrak::find($id_expire_patrak);
        if($expire_patrak->status == 1)
        {
            $old_data = MpmlaPendingLettersPatrak::where('expire_patrak_id',$id_expire_patrak)->first();
            // dd($old_data->previous_month_pending_case);
            // Return view for add information
            return view('admin.patrak.add.mpmla-pending-letters', ['counter' => 1, 'month_name' => $month_name, 'old_data' => $old_data, 'status' => $expire_patrak->status, 'designation' => $designation]);
        }
        else
        {
            // Return view for add information
            return view('admin.patrak.add.mpmla-pending-letters', ['counter' => 1, 'month_name' => $month_name, 'status' => $expire_patrak->status, 'designation' => $designation]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sr_no' => ['required','numeric'],
            'district' => ['required','string'],
            'letters_pending' => ['required','numeric'],
            'letters_received' => ['required','numeric'],
            'disposed' => ['required','numeric'],
            'pending_upto_15_days' => ['required','numeric'],
            'pending_above_1_month' => ['required','numeric'],
            'pending_upto_3_month' => ['required','numeric'],
            'pending_upto_6_month' => ['required','numeric'],
            'pending_above_6_month' => ['required','numeric'],           
        ]);

        // Find User id
        $id_user = Auth::id();

        // Find Patrak_id
        $id_patrak = Patrak::where('patrak_name','MPMLA pending letters')->pluck('id');

        // Determine current month name
        $month_name = Carbon::now()->format('F - Y'); 

        // Find Expire Patrak id
        $id_expire_patrak = ExpirePatrak::where('user_id',$id_user)->where('patrak_id',$id_patrak)->where('current_month',$month_name)->value('id');
    
        // dd($request);

        // Check if Patrak is already filled or not
        $expire_patrak = ExpirePatrak::find($id_expire_patrak);
        if($expire_patrak->status == 1)
        {
            $old_data_id = MpmlaPendingLettersPatrak::where('expire_patrak_id',$id_expire_patrak)->value('id');

            // Check if remarks is empty
            // if($request->remarks == "")
            //     $request->remarks = "-";

            // Update Patark data into database
            $new_data = MpmlaPendingLettersPatrak::find($old_data_id);
            
            $new_data->expire_patrak_id = $id_expire_patrak;
            $new_data->sr_no = $request->sr_no;
            $new_data->district = $request->district;
            $new_data->letters_pending = $request->letters_pending;
            $new_data->letters_received = $request->letters_received;
            $new_data->disposed = $request->disposed;
            $new_data->pending_upto_15_days = $request->pending_upto_15_days;
            $new_data->pending_above_1_month = $request->pending_above_1_month;
            $new_data->pending_upto_3_month = $request->pending_upto_3_month;
            $new_data->pending_upto_6_month = $request->pending_upto_6_month;
            $new_data->pending_above_6_month = $request->pending_above_6_month;           
            $new_data->save();
        }
        else
        {
            // Check if remarks is empty
            // if($request->remarks == "")
            //     $request->remarks = "-";

            // Store Patark data into database
            $new_data = new MpmlaPendingLettersPatrak;
            $new_data->expire_patrak_id = $id_expire_patrak;
            $new_data->sr_no = $request->sr_no;
            $new_data->district = $request->district;
            $new_data->letters_pending = $request->letters_pending;
            $new_data->letters_received = $request->letters_received;
            $new_data->disposed = $request->disposed;
            $new_data->pending_upto_15_days = $request->pending_upto_15_days;
            $new_data->pending_above_1_month = $request->pending_above_1_month;
            $new_data->pending_upto_3_month = $request->pending_upto_3_month;
            $new_data->pending_upto_6_month = $request->pending_upto_6_month;
            $new_data->pending_above_6_month = $request->pending_above_6_month; 
            $new_data->save();

            // Change the status column into the expire patrak table
            $expire_patrak = ExpirePatrak::find($id_expire_patrak);
            $expire_patrak->status = 1;
            $expire_patrak->save();
        }

        // Return to the patrak index page 
        return redirect()->route('patrak.index');
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

    public function fetchdata(Request $request)
    {
        // Determine current date
        $today = Carbon::now()->format('Y-m-d');

        // If Filter is applied
        $IdKacheri = $request->kacheri;
        $month = $request->month;

        // Check for user is admin or not
        if(Auth::user()->isAdmin())
        {
            // Get All data From Patrak 
            $patrak_data = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');
            
            if(($IdKacheri != null) AND ($month == null)) {
                // Get All data From Patrak with selected Kacheri
                $patrak_data = $patrak_data->where('kacheris.id', '=', $IdKacheri);
            }
            else if(($IdKacheri == null) AND ($month != null)) {
                // Get All data From Patrak with selected Month
                $patrak_data = $patrak_data->where('expire_patraks.current_month', '=', $month);
            }
            else if(($IdKacheri != null) AND ($month != null)){
                // Get All data From Patrak with selected kacheri and month
                $patrak_data = $patrak_data->where('kacheris.id', '=', $IdKacheri)
                                           ->where('expire_patraks.current_month', '=', $month);
            }
            $patrak_data = $patrak_data->get();

        }
        elseif(Auth::user()->isUser())
        {
            // Find Current Authorize user id
            $IdUser = Auth::id();

            // Get All data From Patrak 
            $patrak_data = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->where('expire_patraks.user_id','=',$IdUser)
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');
            
            if($month != null) {
                // Get All data From Patrak with selected month
                $patrak_data = $patrak_data->where('expire_patraks.current_month', '=', $month);
            }
            $patrak_data = $patrak_data->get();
        }
        
        return response()->json([
            'patrak_data' => $patrak_data,
        ]);
    }

    public function exportCsv(Request $request)
    {
        
        $fileName = 'Mpmla_pending_letters_patraks.csv';
        
        // Determine current date
        $today = Carbon::now()->format('Y-m-d');
        
        // If Filter is applied
        $IdKacheri = $request->kacheri_id;
        $month = $request->month_year;

        // Check for user is admin or not
        if(Auth::user()->isAdmin())
        {
            
            $datas = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');

            if(($IdKacheri != null) AND ($month == null)) {
                // Get All data From Patrak with selected Kacheri
                $datas = $datas->where('kacheris.id', '=', $IdKacheri);
            }
            else if(($IdKacheri == null) AND ($month != null)) {
                // Get All data From Patrak with selected Month
                $datas = $datas->where('expire_patraks.current_month', '=', $month);
            }
            else if(($IdKacheri != null) AND ($month != null)){
                // Get All data From Patrak with selected kacheri and month
                $datas = $datas->where('kacheris.id', '=', $IdKacheri)
                               ->where('expire_patraks.current_month', '=', $month);
            }
            // Get Filtered or un-filtered data
            $datas = $datas->get();

        }
        elseif(Auth::user()->isUser())
        {
            // Find Current Authorize user id
            $IdUser = Auth::id();

            // Get All data From Patrak 
            $datas = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->where('expire_patraks.user_id','=',$IdUser)
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');
            
            if($month != null) {
                // Get All data From Patrak with selected month
                $datas = $datas->where('expire_patraks.current_month', '=', $month);
            }
            // get filtered or un-filtered data
            $datas = $datas->get();
        }

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('kacheri_name','designation_name', 'district', 'letters_pending', 'letters_received', 'disposed','pending_upto_15_days','pending_above_1_month','pending_upto_3_month','pending_upto_6_month','pending_above_6_month');

        $callback = function() use($datas, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($datas as $data) {
                $row['kacheri_name']  = $data->kacheri_name;
                $row['designation_name']  = $data->designation_name;
                $row['district']    = $data->district;
                $row['letters_pending']    = $data->letters_pending;
                $row['letters_received']  = $data->letters_received;
                $row['disposed']  = $data->disposed;
                $row['pending_upto_15_days']  = $data->pending_upto_15_days;
                $row['pending_above_1_month']  = $data->pending_above_1_month;
                $row['pending_upto_3_month']  = $data->pending_upto_3_month;
                $row['pending_upto_6_month']  = $data->pending_upto_6_month;
                $row['pending_above_6_month']  = $data->pending_above_6_month;

                fputcsv($file, array($row['kacheri_name'],$row['designation_name'],$row['district'], $row['letters_pending'], $row['letters_received'], $row['disposed'], $row['pending_upto_15_days'], $row['pending_above_1_month'], $row['pending_upto_3_month'],$row['pending_upto_6_month'],$row['pending_above_6_month']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function generatePDF(Request $request)
    {
        // Determine current date
        $today = Carbon::now()->format('Y-m-d');
        
        // If Filter is applied
        $IdKacheri = $request->kacheri_id;
        $month = $request->month_year;

        // Check for user is admin or not
        if(Auth::user()->isAdmin())
        {
            
            $datas = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');

            if(($IdKacheri != null) AND ($month == null)) {
                // Get All data From Patrak with selected Kacheri
                $datas = $datas->where('kacheris.id', '=', $IdKacheri);
            }
            else if(($IdKacheri == null) AND ($month != null)) {
                // Get All data From Patrak with selected Month
                $datas = $datas->where('expire_patraks.current_month', '=', $month);
            }
            else if(($IdKacheri != null) AND ($month != null)){
                // Get All data From Patrak with selected kacheri and month
                $datas = $datas->where('kacheris.id', '=', $IdKacheri)
                               ->where('expire_patraks.current_month', '=', $month);
            }
            // Get Filtered or un-filtered data
            $datas = $datas->get()->toArray();
        }
        elseif(Auth::user()->isUser())
        {
            // Find Current Authorize user id
            $IdUser = Auth::id();

            // Get All data From Patrak 
            $datas = MpmlaPendingLettersPatrak::join('expire_patraks', 'expire_patraks.id', '=', 'mpmla_pending_letters_patraks.expire_patrak_id')
                                ->join('department_kacheri_users', 'department_kacheri_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('department_kacheris', 'department_kacheris.id', '=', 'department_kacheri_users.department_kacheri_id')
                                ->join('kacheris', 'kacheris.id', '=', 'department_kacheris.kacheri_id')
                                ->join('designation_users', 'designation_users.user_id', '=', 'expire_patraks.user_id')
                                ->join('designations', 'designations.id', '=', 'designation_users.designation_id')
                                ->where('expire_patraks.user_id','=',$IdUser)
                                // ->where('expire_patraks.start_date', '<=', $today)
                                // ->where('expire_patraks.end_date', '>=', $today)
                                ->orderBy('expire_patraks.created_at')
                                ->orderBy('kacheris.kacheri_name','ASC')
                                ->select('mpmla_pending_letters_patraks.*', 'expire_patraks.user_id', 'kacheris.kacheri_name', 'designations.designation_name', 'department_kacheris.kacheri_id', 'designation_users.designation_id');
            
            if($month != null) {
                // Get All data From Patrak with selected month
                $datas = $datas->where('expire_patraks.current_month', '=', $month);
            }
            // get filtered or un-filtered data
            $datas = $datas->get()->toArray();
        }
          
        // $pdf = PDF::loadView('admin.patrak.pdf.mpmla-pending-letters', ['datas' => $datas])->setPaper('a4', 'landscape');
    
        // return $pdf->download('Mpmla_pending_letters_patraks.pdf');

        $stylesheet = file_get_contents('css/pdf.css');
        $mpdf= new \Mpdf\Mpdf(['mode' => 'utf-8','orientation' => 'L','format' => 'A4-L']);
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML(view('admin.patrak.pdf.mpmla-pending-letters',['datas' => $datas]));
        $mpdf->Output("Mpmla_pending_letters_patraks.pdf", 'D');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->output();
    }

}
