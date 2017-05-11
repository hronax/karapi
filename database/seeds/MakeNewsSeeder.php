<?php

use Illuminate\Database\Seeder;

class MakeNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Інформаційна сесія «Як бізнесу скористатися можливостями програми COSME та HORIZON 2020»',
                     'Семінар «Академічне письмо як інструмент доброчесності»',
                     'Відкрита лекція «Данте: сучасність “Раю”»',
                     'Урочисте засідання Вченої ради університету',] as $spec) {
            DB::table('specializations')->insert([
                'name' => $spec,
                'code' => '0',
                'department_id' => App\Department::where('name', 'Математики і інформатики')->first()->id
            ]);
        }
    }
}
