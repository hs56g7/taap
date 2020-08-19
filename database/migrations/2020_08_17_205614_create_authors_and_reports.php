<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsAndReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view authorsandreports as select t2.id as 'report_id', t2.user_id, t1.name as 'author', t2.title, t2.description, t2.category_id, t3.img, t3.[name], t3.short_name, t4.status from users t1 join reports t2 on t2.user_id = t1.id join categories t3 on t3.id = t2.category_id join reports_to_status t4 on t4.report_id = t2.id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('drop view authorsandreports');
    }
}
