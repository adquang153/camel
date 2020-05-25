<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AllTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'id' => '1',
            'nick_name' => 'Test User',
            'avatar' => 'images/user.png',
            'path' => 'images/user.png',
            'email' => 'super@gmail.com',
            'password' => Hash::make('123123123'),
            'is_admin' => 'Y',
            'is_visible' => 'Y',
            'created_at' => Date('Y-m-d H:i:s'),
        ]);
        for($i = 1; $i<6; $i++){
            
            DB::table('banner')->insert([
                'title' => 'title '.$i,
                'image_banner' => 'images/'.$i.'.jpg',
                'path' => 'images/banner'.$i.'.jpg',
                'start_date' => Date('Y-m-d '),
                'end_date' => '2021-05-30',
                'is_visible' => 'Y',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('product_type')->insert([
                'title' => 'Loại '.$i,
                'image' => 'images/cametype'.$i.'.jpg',
                'path' => 'images/cametype'.$i.'.jpg',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('products')->insert([
                'title' => 'Máy ảnh '.$i,
                'content' => Str::random(100),
                'image_product' => 'images/came'.$i.'.jpg',
                'path' => 'images/came'.$i.'.jpg',
                'price' => $i*20,
                'type' => $i,
                'user_id' => '1',
                'is_visible' => 'Y',
                'user_id' => '1',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('post_type')->insert([
                'title' => 'Loại '.$i,
                'content' => Str::random(100),
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('posts')->insert([
                'title' => 'Post '.$i,
                'content' => Str::random(100),
                'image_post' => 'images/post'.$i.'.jpg',
                'path' => 'images/post'.$i.'.jpg',
                'type' => $i,
                'user_id' => '1',
                'is_visible'=> 'Y',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
        }
    }
}
