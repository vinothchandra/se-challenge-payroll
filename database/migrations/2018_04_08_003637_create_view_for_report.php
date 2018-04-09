<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViewForReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::Raw("
            create  view payroll_report as 
                (
                    select  
                    report_id, employee_id, pay_rate * hours pay,
                    case 
                    	when date_part('day', date) <= 15 then DATE_TRUNC('MONTH', date) 
                    else 
                    	DATE_TRUNC('MONTH', date) + INTERVAL '15 DAY' 
                    end as  period_start,
                    case 
                    	when date_part('day', date) <= 15 then DATE_TRUNC('MONTH', date) + INTERVAL '14 DAY' 
                    else 
                    	DATE_TRUNC('MONTH', date) + INTERVAL '1 MONTH  - 1 DAY' 
                    end as  period_end
                    
                    from payroll 
                    join job_group jb on jb.id = payroll.job_group_id
                )
        ");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
