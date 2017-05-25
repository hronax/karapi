<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MakeBuildingsSeeder::class);
         $this->call(MakeAuditoriesSeeder::class);
         $this->call(MakeDepartmentsSeeder::class);
         $this->call(MakeCategoriesSeeder::class);
         $this->call(MakeSpecializationsSeeder::class);
         $this->call(MakeGroupsSeeder::class);
         $this->call(MakePairsSeeder::class);
         $this->call(MakeSubjectsSeeder::class);
         $this->call(MakeTeachersSeeder::class);
         $this->call(MakeScheduleSeeder::class);
         $this->call(MakeNewsSeeder::class);
         $this->call(MakeGiftsSeeder::class);
         $this->call(MakeCoursesSeeder::class);
         $this->call(MakeExamsSeeder::class);
         $this->call(MakeChangesSeeder::class);
    }
}
