<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('borrow', function (Blueprint $table) {
            $table->id();
            $table->integer('user_fk_id');
            $table->integer('product_fk_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('contact');
            $table->string('speed_test');
            $table->enum('borrow_status', ['Pending', 'Accepted', 'Completed', 'Returned'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrow');
    }
};
