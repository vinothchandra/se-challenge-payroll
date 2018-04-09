<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\JobGroup;

class CreateJobGroupTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 3);
            $table->float('pay_rate', 3, 2);
        });
        
        JobGroup::create(['name' => 'A', 'pay_rate' => 20]);
        JobGroup::create(['name' => 'B', 'pay_rate' => 30]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_group');
    }
}
