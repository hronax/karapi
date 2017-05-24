<?php

use Illuminate\Database\Seeder;

class MakeCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses_titles = [
            'Международная летняя школа в Университете Кадиса',
            'Курсы немецкого языка',
            'Международная учебно-тренинговая программа «Школа академического письма: от теории к практике»',
            'Лекции по виктимологии Кристофера Френча и Валерии Олех (США)',
            'Семинар «Академическое письмо как инструмент добропорядочности» '
        ];

        for ($i = 0; $i < 5; $i ++) {
            $image_name = 'c'.$i.".jpg";

            $sourcePath = public_path('dummy_images');
            //            $file = Input::file($sourcePath.'/'.$image_name);
//            $img = Image::make($file->getRealPath());
            $img = Image::make($sourcePath.'/'.$image_name);
            $destinationPath = public_path('images/courses');

            $new_image_name = substr(md5($courses_titles[$i].time()).$img, 0, 5).'_'.$image_name;

            $img->save($destinationPath.'/'.$new_image_name);

            $destinationPath = public_path('thumbnail/courses');
            $img->resize(150, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$new_image_name);

            DB::table('courses')->insert([
                'name' => $courses_titles[$i],
                'description' => 'Now, How can I get the extension of this file above?
Using input fields I can get the extension like this:',
                'start_date' => date("Y-m-d H:i:s", (time() + rand(36000, 2000000))),
                'image_name' => $new_image_name,
            ]);
        }

    }
}
