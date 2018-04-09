<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Report extends Model
{
    /**
     * This is method that group and extracts the based reportId and employeeid.
     * If Both are null then entire data is returned if not only the data based on the parameters are returned.
     * 
     * @param int $reportId
     * @return $reports
     */
    public static function getReports($reportId = null, $employeeId = null){
        $reports = DB::table('payroll_report')
        ->select(DB::raw('report_id, employee_id, period_start::date, period_end::date, sum(pay)'))
        ->groupBy('report_id', 'employee_id', 'period_start', 'period_end')
        ->orderby('employee_id')
        ->orderby('period_start');
        
        if($reportId != null || $reportId != 0){
            $reports = $reports->where('report_id', $reportId);
        } elseif ($employeeId != null || $employeeId != 0){
                $reports =  $reports->where('employee_id', $employeeId);
        }         
        return $reports->get();
    }
}
