<?php

use Illuminate\Database\Seeder;

class MakeExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = [
            [
                'building_id' => 1,
                'auditory_id' => App\Auditory::where('code', '7-8')->first()->id,
                'subject_id' => App\Subject::where('name', 'Лабораторний практикум')->first()->id,
                'pair_number' => 1,
                'teacher_id' => App\Teacher::where('fio', 'Сичевская Лариса Викторовна')->first()->id,
                'week_day' => 1,
                'position' => 0
            ],
            [
                'building_id' => 4,
                'auditory_id' => App\Auditory::where('code', '301')->first()->id,
                'subject_id' => App\Subject::where('name', 'Термодинамика и статическая физика')->first()->id,
                'pair_number' => 3,
                'teacher_id' => App\Teacher::where('fio', 'Трусова В.М.')->first()->id,
                'week_day' => 1,
                'position' => 0
            ],
            [
                'building_id' => 4,
                'auditory_id' => App\Auditory::where('code', '409')->first()->id,
                'subject_id' => App\Subject::where('name', 'Физическая кинетика')->first()->id,
                'pair_number' => 1,
                'teacher_id' => App\Teacher::where('fio', 'Горбенко Галина Петровна')->first()->id,
                'week_day' => 2,
                'position' => 0
            ],
            [
                'building_id' => 2,
                'auditory_id' => App\Auditory::where('code', '207')->first()->id,
                'subject_id' => App\Subject::where('name', 'Взаимодействие излучения с веществом')->first()->id,
                'pair_number' => 3,
                'teacher_id' => App\Teacher::where('fio', 'Наумовец Артем Сергеевич')->first()->id,
                'week_day' => 2,
                'position' => 0
            ],
            [
                'building_id' => 2,
                'auditory_id' => App\Auditory::where('code', '207')->first()->id,
                'subject_id' => App\Subject::where('name', 'Вступление в физику твердых тел')->first()->id,
                'pair_number' => 3,
                'teacher_id' => App\Teacher::where('fio', 'Шеина Ирина Валерьевна')->first()->id,
                'week_day' => 2,
                'position' => 0
            ],
            [
                'building_id' => 4,
                'auditory_id' => App\Auditory::where('code', '409')->first()->id,
                'subject_id' => App\Subject::where('name', 'Вступление в компьютерное моделирование')->first()->id,
                'pair_number' => 1,
                'teacher_id' => App\Teacher::where('fio', 'Федосова Светлана Николаевна')->first()->id,
                'week_day' => 3,
                'position' => 1
            ],
            [
                'building_id' => 1,
                'auditory_id' => App\Auditory::where('code', '7-9')->first()->id,
                'subject_id' => App\Subject::where('name', 'Физиология')->first()->id,
                'pair_number' => 2,
                'teacher_id' => App\Teacher::where('fio', 'Вус К.В.')->first()->id,
                'week_day' => 4,
                'position' => 0
            ],
            [
                'building_id' => 2,
                'auditory_id' => App\Auditory::where('code', '207')->first()->id,
                'subject_id' => App\Subject::where('name', 'Радиология')->first()->id,
                'pair_number' => 3,
                'teacher_id' => App\Teacher::where('fio', 'Ходусов В.Д.')->first()->id,
                'week_day' => 4,
                'position' => 0
            ]
        ];

        foreach ($schedule as $sch) {
            DB::table('exams')->insert([
                'group_id' => App\Group::where('code', 'ТЛ-41')->first()->id,
//                'building_id' => $sch['building_id'],
                'auditory_id' => $sch['auditory_id'],
                'subject_id' => $sch['subject_id'],
                'teacher_id' => $sch['teacher_id'],
                'type' => rand(1,2),
                'pass_date' => date("Y-m-d H:i:s", (time() + rand(36000, 2000000))),
            ]);
        }
    }
}
