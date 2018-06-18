<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackcattestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packcattests', function (Blueprint $table) {
            $table->integer('package_id')->unsigned();
            $table->string('cat_id');
            $table->string('test_id');
            $table->timestamps();
        });

        Schema::table('packcattests',function($table){
            $table->foreign('package_id')->references('package_id')->on('packages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packcattests');
    }
}
