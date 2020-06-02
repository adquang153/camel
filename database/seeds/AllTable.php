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
            'nick_name' => 'Test User',
            'avatar' => 'images/user.png',
            'path' => 'images/user.png',
            'email' => 'test@gmail.com',
            'password' => Hash::make('123123123'),
            'is_admin' => 'Y',
            'is_visible' => 'Y',
            'created_at' => Date('Y-m-d H:i:s'),
        ]);
        for($i = 1; $i<=6; $i++){
            
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
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum nisi consequuntur vero. Repudiandae, culpa inventore maiores aliquid debitis consectetur fugit accusantium ullam quo consequuntur porro eius, architecto autem? Illum, voluptatibus.',
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
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid atque omnis, perspiciatis corrupti voluptatum ullam dolores optio reprehenderit reiciendis expedita labore voluptates iusto soluta harum natus obcaecati excepturi animi commodi!',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('posts')->insert([
                'title' => 'Post '.$i,
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid atque omnis, perspiciatis corrupti voluptatum ullam dolores optio reprehenderit reiciendis expedita labore voluptates iusto soluta harum natus obcaecati excepturi animi commodi!',
                'image_post' => 'images/post'.$i.'.jpg',
                'path' => 'images/post'.$i.'.jpg',
                'type' => $i,
                'user_id' => '1',
                'is_visible'=> 'Y',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('feedback')->insert([
                'title' => 'Feedback '.$i,
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid atque omnis, perspiciatis corrupti voluptatum ullam dolores optio reprehenderit reiciendis expedita labore voluptates iusto soluta harum natus obcaecati excepturi animi commodi!',
                'user_id' => '1',
                'is_visible' => 'Y',
                'created_at' => Date('Y-m-d H:i:s'),
            ]);
            DB::table('about_us')->insert([
                'title' => 'About '.$i,
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquam consequuntur quasi atque at, labore laborum quidem tempore. Et repellat perspiciatis voluptate eaque consequuntur blanditiis. Quae, recusandae. Saepe officiis sunt sed!',
                'image' => 'images/about'.$i.'.png',
                'path' => 'images/about'.$i,
                'is_visible' => 'Y',
            ]);
        }
    }
}
