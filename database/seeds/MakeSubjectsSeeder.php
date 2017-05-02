<?php

use Illuminate\Database\Seeder;

class MakeSubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Лабораторний практикум', 'Биохимия', 'Термодинамика и статическая физика', 'Физическая кинетика', 'Взаимодействие излучения с веществом', 'Вступление в физику твердых тел', 'Вступление в компьютерное моделирование', 'Охрана труда', 'Люминисцентные методы в биоголии и медицине', 'Физиология', 'Радиология'] as $subj) {
            DB::table('subjects')->insert([
                'name' => $subj
            ]);
        }
    }
}
