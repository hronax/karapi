<?php

use Illuminate\Database\Seeder;

class MakeDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'Біологічний', 'Геології, георгафії, рекреації і туризму', 'Екологічний', 'Економічний', 'Іноземних мов', 'Історичний', "Комп'ютерних наук", 'Математики і інформатики', 'Міжнародних економічних відносин та туристичного бізнесу', 'Медичний', 'Психології', "Радіофізики, біомедичної електроніки та комп'ютерних систем", 'Соціологічний', 'Фізико-енергетичний', 'Фізико-технічний', 'Фізичний', 'Філологічний', 'Філософський', 'Хімічний', 'Юридичний', 'Каразінська школа бізнесу', 'Інститут післядипломної освіти та заочного (дистанційного) навчання'
        ] as $department) {
            DB::table('departments')->insert([
                'name' => $department
            ]);
        }
    }
}