<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffmembersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'staffMembers';

    /**
     * Run the migrations.
     * @table staffMembers
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('fio', 45);
            $table->string('position', 45);
            $table->date('employment_date');
            $table->unsignedInteger('salary');
            $table->unsignedInteger('chiefID');

            $table->index(["chiefID"], 'departmentHeadsID');


            $table->foreign('chiefID', 'departmentHeadsID')
                ->references('id')->on('departmentHeads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
