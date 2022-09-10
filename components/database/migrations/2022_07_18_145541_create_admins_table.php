<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('sitename')->nullable();
            $table->mediumText('sitedes')->nullable();
            $table->string('toptext')->default('Buy products');
            $table->string('toplink')->default('https://l.l2u.in/services');
            $table->mediumText('servicedes')->nullable();
            $table->string('col2')->nullable();
            $table->string('col3')->nullable();
            $table->string('col3s1')->nullable();
            $table->string('col3s2')->nullable();
            $table->string('col3s3')->nullable();
            $table->mediumText('advertise')->nullable();
            $table->string('facebook')->nullable('webfuelcode');
            $table->string('twitter')->nullable('webfuelcode');
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable('webfuelcode');
            $table->string('youtube')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
