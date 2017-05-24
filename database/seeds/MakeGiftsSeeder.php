<?php

use Illuminate\Database\Seeder;

class MakeGiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gifts_titles = [
            'Брелок-открывалка',
            'Чашка',
            'Папка пластиковая с гербом университета на резинках',
            'Открывалка пластиковая с гербом университета',
            'Блокнот пластиковый, формат - А5, 80 листов на пружине.'
        ];

        for ($i = 0; $i < 5; $i ++) {
            $image_name = $i.".jpg";

            $sourcePath = public_path('dummy_images');
            //            $file = Input::file($sourcePath.'/'.$image_name);
//            $img = Image::make($file->getRealPath());
            $img = Image::make($sourcePath.'/'.$image_name);
            $destinationPath = public_path('images/gifts');

            $new_image_name = substr(md5($gifts_titles[$i].time()).$img, 0, 5).'_'.$image_name;

            $img->save($destinationPath.'/'.$new_image_name);

            $destinationPath = public_path('thumbnail/gifts');
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$new_image_name);

            DB::table('gifts')->insert([
                'name' => $gifts_titles[$i],
                'description' => 'пара слов о товаре',
                'price' => rand(5,30),
                'image_name' => $new_image_name,
            ]);
        }

    }
}
