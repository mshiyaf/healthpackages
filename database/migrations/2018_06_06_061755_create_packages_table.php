<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('service_id');
          $table->string('packagename');
          $table->string('packagetype');
          $table->string('duration');
          $table->integer('totalcost');
          $table->integer('offerprice');
          // // $table->string('availability');
          $table->boolean('insuranceclaim');
          // $table->string('agegroup');
          // // $table->('medhistory');
          // $table->string('r_duration');
          // $table->string('r_cost');
          $table->rememberToken();
          $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
