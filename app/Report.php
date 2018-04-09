<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Report extends Model
{
    /**
     *
     * @param int $reportId
     * @return $reports
     */
    public static function getReports($reportId = null, $employeeId = null){
        $reports = DB::table('payroll_report')
        ->select(DB::raw('report_id, employee_id, period_start::date, period_end::date, sum(pay)'))
        ->groupBy('report_id', 'employee_id', 'period_start', 'period_end');
        
        if($reportId != null || $reportId != 0){
            $reports = $reports->where('report_id', $reportId);
        } elseif ($employeeId != null || $employeeId != 0){
            $reports =  $reports->where('employee_id', $employeeId);
        }         
        return $reports->get();
    }
}
