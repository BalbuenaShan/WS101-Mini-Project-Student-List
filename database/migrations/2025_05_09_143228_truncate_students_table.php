<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Correctly import the DB facade

class TruncateStudentsTable extends Migration
{
    public function up()
    {
        DB::statement('TRUNCATE TABLE students');
    }

    public function down()
    {
        // Optional: You can define the down method if needed
    }
}