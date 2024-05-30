<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatagurusTable extends Migration
{
    public function up()
    {
        Schema::create('datagurus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('umur');
            $table->string('masakerja')->nullable();
            $table->string('jabatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
