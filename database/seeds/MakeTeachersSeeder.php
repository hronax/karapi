<?php

use Illuminate\Database\Seeder;

class MakeTeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Сичевская Лариса Викторовна', 'Баранник Евгений Александрович', 'Трусова В.М.', 'Горбенко Галина Петровна', 'Наумовец Артем Сергеевич', 'Шеина Ирина Валерьевна', 'Федосова Светлана Николаевна', 'Некрасова Альбертина Владимирована', 'Лукьянец Лариса Викторовна', 'Вус К.В.', 'Ходусов В.Д.'] as $t) {
            DB::table('teachers')->insert([
                'fio' => $t
            ]);
        }
    }
}
