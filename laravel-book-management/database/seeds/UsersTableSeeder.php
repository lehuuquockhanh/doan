<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'created_at' => '2020-06-22 01:39:51',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'id' => 1,
                'name' => 'Nguyễn Đức Âu',
                'password' => '$2y$10$60bZ.PcKtz3FWKkznLFbSe9y9OwmGXTfodPupVLwjBPRlJXk8eeJO',
                'remember_token' => NULL,
                'role' => 'admin',
                'updated_at' => '2020-06-22 01:39:51',
            ),
            1 => 
            array (
                'created_at' => '2020-06-23 01:26:35',
                'email' => 'admin222@gmail.com',
                'email_verified_at' => NULL,
                'id' => 2,
                'name' => 'Nguyễn Đức Âu 222',
                'password' => '$2y$10$CxUBzqtsfzhfdtduMhthduvJ9BNs8csGf/wlHV2GaJDEHuYmSYsI2',
                'remember_token' => NULL,
                'role' => 'admin',
                'updated_at' => '2020-06-23 01:26:35',
            ),
            2 => 
            array (
                'created_at' => '2020-06-23 01:51:50',
                'email' => 'admin55555@gmail.com',
                'email_verified_at' => NULL,
                'id' => 3,
                'name' => 'fdsfsd',
                'password' => '$2y$10$krUVlFTG0Q6I3J0Wn6gxK.rSVsqph7elNm9wFwsLBMXUU/aLDluv.',
                'remember_token' => NULL,
                'role' => 'admin',
                'updated_at' => '2020-06-23 01:51:50',
            ),
        ));
        
        
    }
}