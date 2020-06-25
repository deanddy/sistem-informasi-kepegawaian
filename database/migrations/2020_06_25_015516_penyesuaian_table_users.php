<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenyesuaianTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("username")->unique();
            $table->string("roles");
            $table->date('tanggal_lahir');
            $table->string("tempat_lahir");
            $table->string("jenis_kelamin");
            $table->string("status_perkawinan");
            $table->integer("jumlah_anak")->nullable();
            $table->string("pendidikan_terakhir");
            $table->string("jurusan_pendidikan_terakhir");
            $table->string("nik");
            $table->string("rayon_kerja")->nullable();
            $table->unsignedBigInteger("jabatan_id")->nullable();
            $table->text("tempat_tinggal");
            $table->string("telepon");
            $table->string("foto");
            $table->integer("sisa_cuti_tahunan");
            $table->enum("status", ["ACTIVE", "INACTIVE"]);

            $table->foreign('jabatan_id')->references('id')->on('jabatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            Schema::table('users', function(Blueprint $table){
                $table->dropForeign('jabatan_id');
            });

			$table->dropColumn("username");
            $table->dropColumn("roles");
            $table->dropColumn("tanggal_lahir");
            $table->dropColumn("tempat_lahir");
            $table->dropColumn("jenis_kelamin");
            $table->dropColumn("status_perkawinan");
            $table->dropColumn("jumlah_anak");
            $table->dropColumn("pendidikan_terakhir");
            $table->dropColumn("jurusan_pendidikan_terakhir");
            $table->dropColumn("nik");
            $table->dropColumn("rayon_kerja");
            $table->dropColumn("sisa_cuti_tahunan");
            $table->dropColumn("jabatan_id");
			$table->dropColumn("tempat_tinggal");
			$table->dropColumn("telepon");
            $table->dropColumn("foto");
            $table->dropColumn("sisa_cuti_tahunan");
			$table->dropColumn("status");
		});
    }
}
