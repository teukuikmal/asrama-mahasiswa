<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('mata_pelajaran');
            $table->unsignedBigInteger('pengajar_id'); 
            $table->string('tingkat');
            $table->timestamps();

           
            $table->foreign('pengajar_id')->references('id')->on('pengajars')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::table('pelajarans', function (Blueprint $table) {
            $table->dropForeign(['pengajar_id']);
            $table->dropColumn('pengajar_id');
        });
    }
};
