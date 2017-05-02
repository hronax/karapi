<?php

use Illuminate\Database\Seeder;

class MakeSpecializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Інформатика', 'Прикладна математика', 'Математика'] as $spec) {
            DB::table('specializations')->insert([
                'name' => $spec,
                'code' => '0',
                'department_id' => App\Department::where('name', 'Математики і інформатики')->first()->id
            ]);
        }

        foreach (['Експериментальна ядерна фізика та фізика плазми', 'Прикладна фізика', 'Медична фізика'] as $spec) {
            DB::table('specializations')->insert([
                'name' => $spec,
                'code' => '0',
                'department_id' => App\Department::where('name', 'Фізико-технічний')->first()->id
            ]);
        }
    }
}
