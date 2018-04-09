<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Report;

class ReportController extends Controller
{
    /**
     * 
     */
    public function index(){
        return view('report')->with('reports', Report::getReports())->with('all_reports', true);
    }
    
    /**
     * 
     * @param int $reportId
     */
    public function get(int $reportId){
        return view('report')->with('reports', Report::getReports($reportId))->with('all_reports', false);
    }
    

}
