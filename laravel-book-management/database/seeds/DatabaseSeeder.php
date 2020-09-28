<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(ChiTietDonHangTableSeeder::class);
        $this->call(DanhMucSachTableSeeder::class);
        $this->call(DonHangTableSeeder::class);
        $this->call(KhachHangTableSeeder::class);
        $this->call(NhaXuatBanTableSeeder::class);
        $this->call(SachTableSeeder::class);
        $this->call(TacGiaTableSeeder::class);
        $this->call(TheLoaiSachTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
