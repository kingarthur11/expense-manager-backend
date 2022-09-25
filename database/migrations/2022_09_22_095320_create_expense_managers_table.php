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
        Schema::create('expense_managers', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->enum('marchant', ['taxi', 'rental_car', 'shuttle', 'hotel']);
            $table->enum('status', ['new', 'in_progress', 'reinburse']);
            $table->decimal('total', 20,2);
            $table->date('date_applied');
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
        Schema::dropIfExists('expense_managers');
    }
};
