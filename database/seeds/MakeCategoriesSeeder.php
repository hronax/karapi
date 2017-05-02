<?php

use Illuminate\Database\Seeder;

class MakeCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Спорт', 'Общественная жизнь', 'Курсы', 'Лекции', 'Олимпиады', 'Личности'] as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
