<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    
    protected $fillable = array(
        'report_id',
        'employee_id',
        'job_group_id',
        'date',
        'hours'
    );
    
    protected $table = 'payroll';
    
    public $timestamps = false;}
