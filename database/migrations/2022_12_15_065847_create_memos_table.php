<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->unsignedbiginteger('id', true);
            $table->unsignedbiginteger('folder_id');
            $table->string('content');
            $table->date('due_date');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memos');
    }
};
