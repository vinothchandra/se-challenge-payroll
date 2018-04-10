<?php
use App\Report;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

// Takes to the homepage
Route::get('/', function () {
    return view('index')->with('reports', Report::getReports());
    ;
});

// Route for parsing the file. The logic is in store method of PayrollController.php
Route::post('/payroll', 'PayrollController@store');

// Routes for resndering the reports.
Route::get('/employee/{employee_id}', function ($employeeId) {
    return view('report')->with('reports', Report::getReports(null, $employeeId));
});

Route::get('/report', function () {
    return view('report')->with('reports', Report::getReports(null, null));
});

Route::get('/report/{reportid?}', function ($reportId) {
    return view('report')->with('reports', Report::getReports($reportId, null));
});