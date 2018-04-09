<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class JobGroup extends Model
{

    protected $fillable = array(
        'name',
        'pay_rate'
    );
    
    protected $table = 'job_group';
    
    public $timestamps = false;
    
    // public function fish() {
    // return $this->hasOne('Fish'); // this matches the Eloquent model
    // }
}
