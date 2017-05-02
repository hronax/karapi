<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auditories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('building_id');

            $table->timestamps();
        });

        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('specializations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->integer('department_id');

            $table->timestamps();
        });

        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio');

            $table->timestamps();
        });

        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('specialization_id');
            $table->integer('course_number');

            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('pairs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('building_id');
            $table->integer('pair_number');
            $table->string('time_start');
            $table->string('time_end');

            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auditory_id');
            $table->integer('group_id');
            $table->integer('subject_id');
            $table->integer('pair_id');
            $table->integer('teacher_id');
            $table->integer('week_day');
            $table->integer('position');

            $table->timestamps();
        });

        Schema::create('changes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('auditory_id');
            $table->integer('group_id');
            $table->integer('subject_id');
            $table->integer('pair_id');
            $table->integer('teacher_id');
            $table->date('date');

            $table->timestamps();
        });

        Schema::create('subject_specialization', function (Blueprint $table) {
            $table->integer('subject_id');
            $table->integer('specialization_id');
            $table->integer('course_number');

            $table->timestamps();
        });

        Schema::create('exams', function (Blueprint $table) {
            $table->integer('group_id');
            $table->integer('subject_id');
            $table->integer('type');
            $table->integer('auditory_id');
            $table->integer('teacher_id');
            $table->date('pass_date');

            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            $table->string('image_path');
            $table->date('start_date');

            $table->timestamps();
        });

        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('description');
            $table->string('image_path');
            $table->integer('price');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
