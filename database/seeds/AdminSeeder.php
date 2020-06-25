<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\User;

        $admin->username = "admin";
        $admin->roles = json_encode(["ADMIN", "PEGAWAI"]);
        $admin->name = "Admin Kepegawaian";
        $admin->email = "admin@sisipeg.com";
        $admin->password = \Hash::make("admin");
        $admin->tempat_lahir = "Bandung";
        $admin->tanggal_lahir = Carbon::now();
        $admin->jenis_kelamin   = "PRIA";
        $admin->status_perkawinan   = "BELUM MENIKAH";
        $admin->jumlah_anak = 0;
        $admin->pendidikan_terakhir = "S1";
        $admin->jurusan_pendidikan_terakhir = "SISTEM INFORMASI";
        $admin->nik = "10000000";
        $admin->rayon_kerja = "";
        $admin->jabatan_id  = null;
        $admin->tempat_tinggal = "Bandung, Jawa Barat";
        $admin->telepon = "1010";
        $admin->foto = "belum-ada-foto.jpg";
        $admin->sisa_cuti_tahunan = 3;
      
        $admin->save();

        $this->command->info("User Admin berhasil diinsert");


    }
}
