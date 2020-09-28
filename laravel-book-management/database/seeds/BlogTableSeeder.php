<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blog')->delete();
        
        \DB::table('blog')->insert(array (
            0 => 
            array (
                'category' => 3,
                'created_at' => '2020-06-26 04:25:24',
                'hinh_anh' => 'images/blog/159314552411120714.jpeg',
                'id' => 1,
                'mo_ta' => 'ttttttttttttggggggggggg',
                'mo_ta2' => 'fdsfffsdfd',
                'title' => 'Hoạt động quốc tế của cuốn sách Frankfurt',
                'updated_at' => '2020-06-26 04:25:57',
            ),
            1 => 
            array (
                'category' => 4,
                'created_at' => '2020-06-26 04:26:47',
                'hinh_anh' => 'images/blog/159314560790310903.jpeg',
                'id' => 2,
                'mo_ta' => 'Find all the information you need to ensure your experience.Find all the information you need to ensure your experience . Find all the information you of.',
                'mo_ta2' => 'sdaasdasdas',
                'title' => 'Đọc có một số thông tin quan trọng',
                'updated_at' => '2020-06-26 04:26:47',
            ),
            2 => 
            array (
                'category' => 6,
                'created_at' => '2020-06-26 04:27:08',
                'hinh_anh' => 'images/blog/159314562874009649.jpeg',
                'id' => 3,
                'mo_ta' => 'The London Book Fair is the global area inon marketplace for rights negotiation.The year London Book Fair is the global area inon forg marketplace for rights.',
                'mo_ta2' => 'gfdgfdgfd',
                'title' => 'Hội chợ sách London sẽ được tổ chức với sự thú vị',
                'updated_at' => '2020-06-26 04:27:08',
            ),
        ));
        
        
    }
}