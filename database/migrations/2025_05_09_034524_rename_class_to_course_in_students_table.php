<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameClassToCourseInStudentsTable extends Migration
{
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renameColumn('class', 'course');
        });
    }

    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->renameColumn('course', 'class');
        });
    }
}