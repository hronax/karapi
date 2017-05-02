<?php

use Illuminate\Database\Seeder;

class MakeGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['МФ-11', 'МФ-21', 'МФ-31', 'МФ-41', 'МФ-51', 'МФ-61'] as $index => $group) {
            DB::table('groups')->insert([
                'code' => $group,
                'course_number' => $index+1,
                'specialization_id' => App\Specialization::where('name', 'Інформатика')->first()->id
            ]);
        }

        foreach (['МП-11', 'МП-21', 'МП-31', 'МП-41', 'МП-51', 'МП-61'] as $index => $group) {
            DB::table('groups')->insert([
                'code' => $group,
                'course_number' => $index+1,
                'specialization_id' => App\Specialization::where('name', 'Прикладна математика')->first()->id
            ]);
        }

        foreach (['М-111', 'М-121', 'М-131', 'М-141', 'М-151', 'М-161',] as $index => $group) {
            DB::table('groups')->insert([
                'code' => $group,
                'course_number' => $index+1,
                'specialization_id' => App\Specialization::where('name', 'Математика')->first()->id
            ]);
        }

        DB::table('groups')->insert([
            'code' => 'ТЛ-41',
            'course_number' => 4,
            'specialization_id' => App\Specialization::where('name', 'Медична фізика')->first()->id
        ]);
    }
}
