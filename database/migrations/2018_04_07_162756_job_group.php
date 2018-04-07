<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobGroup extends Migration
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
            $table->integer('name');
            $table->float('pay_rate', 3, 2);
        });
        
        // TODO : Seeding the database with the twp job groups
        

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
