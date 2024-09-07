<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\AdminsController;
// Route::get('/admin', [App\Http\Controllers\AdminsController::class,'index'])->name('admin.index');

Auth::routes();

//This Contoller is user as admincontroller and this only works for middleware and redirect to the admin's index file
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

//This Contoller is user as usercontroller and this only works for middleware and redirect to the user's index file
// Route::get('/user', [App\Http\Controllers\HomeController::class, 'user_index'])->name('user.index');

Route::middleware('auth')->group(function(){

    // For dashboard Fetch data
    Route::post('admin/index/fetchdata', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index.fetchdata');

    //For Fetch The Kacheri
    Route::post('user/add-user/fetch-kacheri', [App\Http\Controllers\Auth\RegisterController::class, 'fetchKacheri']);


    //Edit User
    Route::patch('/user/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
    Route::get('/user/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');


    //For Fetch The Kacheri From Permission Controller
    Route::post('user/user-permission/fetch-kacheri',[App\Http\Controllers\PermissionController::class, 'fetchKacheri']);

    //For Fetch The Department And Kacheri From Permission Controller
    Route::post('user/user-permission/fetch-Department',[App\Http\Controllers\PermissionController::class, 'fetchDepartment']);

    //For Fetch The User From Permission Controller
    Route::post('user/user-permission/fetch-user',[App\Http\Controllers\PermissionController::class, 'fetchUser']);


    //Patrak index file or patrak list file
    Route::get('/patrak/index', [App\Http\Controllers\PatrakController::class, 'index'])->name('patrak.index');


    //View Patrak Route
    Route::get('admin/patrak/civil-authority-case-disposal', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'index'])->name('admin.patrak.civil');
    Route::post('admin/patrak/civil-authority-case-disposal/fetchdata', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'fetchData'])->name('admin.patrak.civil.fetchdata');

    Route::get('admin/patrak/information-of-pending-cases-for-pension', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'index'])->name('admin.patrak.pending_cases_pension');
    Route::post('admin/patrak/information-of-pending-cases-for-pension/fetchdata', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'fetchData'])->name('admin.patrak.pending_cases_pension.fetchData');

    Route::get('admin/patrak/ag-audit-pending-para-information', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'index'])->name('admin.patrak.ag_audit');
    Route::post('admin/patrak/ag-audit-pending-para-information/fetchdata', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'fetchdata'])->name('admin.patrak.ag_audit.fetchdata');

    Route::get('admin/patrak/information-of-pending-sheet', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'index'])->name('admin.patrak.pending_sheet');
    Route::post('admin/patrak/information-of-pending-sheet/fetchdata', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'fetchdata'])->name('admin.patrak.pending_sheet.fetchdata');

    Route::get('admin/patrak/information-of-pending-recovery', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'index'])->name('admin.patrak.pending_recovery');
    Route::post('admin/patrak/information-of-pending-recovery/fetchdata', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'fetchdata'])->name('admin.patrak.pending_recovery.fetchdata');

    Route::get('admin/patrak/departmental-investigation', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'index'])->name('admin.patrak.depatmental_investigation');
    Route::post('admin/patrak/departmental-investigation/fetchdata', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'fetchdata'])->name('admin.patrak.depatmental_investigation.fetchdata');

    Route::get('admin/patrak/rti-application', [App\Http\Controllers\RtiApplicationPatrakController::class, 'index'])->name('admin.patrak.rti_application');
    Route::post('admin/patrak/rti-application/fetchdata', [App\Http\Controllers\RtiApplicationPatrakController::class, 'fetchdata'])->name('admin.patrak.rti_application.fetchdata');

    Route::get('admin/patrak/rti-appeal', [App\Http\Controllers\RtiAppealPatrakController::class, 'index'])->name('admin.patrak.rti_appeal');
    Route::post('admin/patrak/rti-appeal/fetchdata', [App\Http\Controllers\RtiAppealPatrakController::class, 'fetchdata'])->name('admin.patrak.rti_appeal.fetchdata');
    
    Route::get('admin/patrak/mpmla-pending-letters', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'index'])->name('admin.patrak.mpmla');
    Route::post('admin/patrak/mpmla-pending-letters/fetchdata', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'fetchdata'])->name('admin.patrak.mpmla.fetchdata');


    // Excel Download
    Route::get('/patrak/civil-authority-case-disposal/csv', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'exportCSV'])->name('patrak.civil.csv');

    Route::get('/patrak/information-of-pending-cases-for-pension/csv', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'exportCSV'])->name('patrak.pending_cases_pension.csv');

    Route::get('/patrak/ag-audit-pending-para-information/csv', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'exportCSV'])->name('patrak.ag_audit.csv');

    Route::get('/patrak/information-of-pending-sheet/csv', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'exportCSV'])->name('patrak.pending_sheet.csv');

    Route::get('/patrak/information-of-pending-recovery/csv', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'exportCSV'])->name('patrak.pending_recovery.csv');

    Route::get('/patrak/departmental-investigation/csv', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'exportCSV'])->name('patrak.depatmental_investigation.csv');

    Route::get('/patrak/rti-application/csv', [App\Http\Controllers\RtiApplicationPatrakController::class, 'exportCSV'])->name('patrak.rti_application.csv');

    Route::get('/patrak/rti-appeal/csv', [App\Http\Controllers\RtiAppealPatrakController::class, 'exportCSV'])->name('patrak.rti_appeal.csv');

    Route::get('/patrak/mpmla-pending-letters/csv', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'exportCSV'])->name('patrak.mpmla.csv');


    // PDF Download
    Route::get('/patrak/civil-authority-case-disposal/pdf', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'generatePDF'])->name('patrak.civil.pdf');

    Route::get('/patrak/information-of-pending-cases-for-pension/pdf', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'generatePDF'])->name('patrak.pending_cases_pension.pdf');

    Route::get('/patrak/ag-audit-pending-para-information/pdf', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'generatePDF'])->name('patrak.ag_audit.pdf');
    
    Route::get('/patrak/information-of-pending-sheet/pdf', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'generatePDF'])->name('patrak.pending_sheet.pdf');

    Route::get('/patrak/information-of-pending-recovery/pdf', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'generatePDF'])->name('patrak.pending_recovery.pdf');

    Route::get('/patrak/departmental-investigation/pdf', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'generatePDF'])->name('patrak.depatmental_investigation.pdf');

    Route::get('/patrak/rti-application/pdf', [App\Http\Controllers\RtiApplicationPatrakController::class, 'generatePDF'])->name('patrak.rti_application.pdf');

    Route::get('/patrak/rti-appeal/pdf', [App\Http\Controllers\RtiAppealPatrakController::class, 'generatePDF'])->name('patrak.rti_appeal.pdf');

    Route::get('/patrak/mpmla-pending-letters/pdf', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'generatePDF'])->name('patrak.mpmla.pdf');


    //Add Patrak Route
    Route::get('/patrak/add/civil-authority-case-disposal', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'create'])->name('patrak.add.civil');
    Route::post('/patrak/add/civil-authority-case-disposal/store', [App\Http\Controllers\CivilAuthorityCaseDisposalPatrakController::class, 'store'])->name('patrak.add.store.civil');

    Route::get('/patrak/add/information-of-pending-cases-for-pension', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'create'])->name('patrak.add.pending_cases_pension');
    Route::post('/patrak/add/information-of-pending-cases-for-pension/store', [App\Http\Controllers\PendingCasesForPensionPatrakController::class, 'store'])->name('patrak.add.store.pending_cases_pension');

    Route::get('/patrak/add/ag-audit-pending-para-information', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'create'])->name('patrak.add.ag_audit');
    Route::post('/patrak/add/ag-audit-pending-para-information/store', [App\Http\Controllers\AgAuditPendingParaInfoPatrakController::class, 'store'])->name('patrak.add.store.ag_audit');

    Route::get('/patrak/add/information-of-pending-sheet', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'create'])->name('patrak.add.pending_sheet');
    Route::post('/patrak/add/information-of-pending-sheet/store', [App\Http\Controllers\InfoOfPendingSheetsPatrakController::class, 'store'])->name('patrak.add.store.pending_sheet');

    Route::get('/patrak/add/information-of-pending-recovery', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'create'])->name('patrak.add.pending_recovery');
    Route::post('/patrak/add/information-of-pending-recovery/store', [App\Http\Controllers\InfoOfPendingRecoveryPatrakController::class, 'store'])->name('patrak.add.store.pending_recovery');

    Route::get('/patrak/add/departmental-investigation', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'create'])->name('patrak.add.depatmental_investigation');
    Route::post('/patrak/add/departmental-investigation/store', [App\Http\Controllers\DepartmentalInvestigationPatrakController::class, 'store'])->name('patrak.add.store.depatmental_investigation');

    Route::get('/patrak/add/rti-application', [App\Http\Controllers\RtiApplicationPatrakController::class, 'create'])->name('patrak.add.rti_application');
    Route::post('/patrak/add/rti-application/store', [App\Http\Controllers\RtiApplicationPatrakController::class, 'store'])->name('patrak.add.store.rti_application');

    Route::get('/patrak/add/rti-appeal', [App\Http\Controllers\RtiAppealPatrakController::class, 'create'])->name('patrak.add.rti_appeal');
    Route::post('/patrak/add/rti-appeal/store', [App\Http\Controllers\RtiAppealPatrakController::class, 'store'])->name('patrak.add.store.rti_appeal');

    Route::get('/patrak/add/mpmla-pending-letters', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'create'])->name('patrak.add.mpmla');
    Route::post('/patrak/add/mpmla-pending-letters/store', [App\Http\Controllers\MpmlaPendingLettersPatrakController::class, 'store'])->name('patrak.add.store.mpmla');

});


Route::middleware(['isadmin','auth'])->group(function(){

    //User Details 
    Route::get('/user/details', [App\Http\Controllers\UserController::class, 'index'])->name('user.detail');

    //Destroy the user
    Route::post('users/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

    
    //User Permission 
    Route::get('/user/permission', [App\Http\Controllers\PermissionController::class, 'create'])->name('user.permission');

    // For Store User Permission 
    Route::post('/user/permission/store', [App\Http\Controllers\PermissionController::class, 'store'])->name('user.permission.store');


    //This is For Add Kacheri
    Route::get('/kacheri/add', [App\Http\Controllers\KacheriController::class, 'create'])->name('kacheri.add');
    //This post is use because here for store entry into the database otherwise we use the get or head method
    Route::post('/kacheri/add/store', [App\Http\Controllers\KacheriController::class, 'store'])->name('kacheri.add.store');


    //This is For Add Department
    Route::get('/department/add', [App\Http\Controllers\DepartmentController::class, 'create'])->name('department.add');
    //This post is use because here for store entry into the database otherwise we use the get or head method
    Route::post('/department/add/store', [App\Http\Controllers\DepartmentController::class, 'store'])->name('department.add.store');


    //This is For Add Designation
    Route::get('/designation/add', [App\Http\Controllers\DesignationController::class, 'create'])->name('designation.add');
    //This post is use because here for store entry into the database otherwise we use the get or head method
    Route::post('/designation/add/store', [App\Http\Controllers\DesignationController::class, 'store'])->name('designation.add.store');

});