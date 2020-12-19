<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('assignment_id')
                ->constrained('assignments')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('file_path');
            $table->boolean('status')->default(0);
            $table->tinyInteger('grade')->nullable();
            $table->timestamps();
            $table->primary(['user_id', 'assignment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaded');
    }
}
