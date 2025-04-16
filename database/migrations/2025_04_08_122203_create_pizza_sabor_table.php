<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('pizza_sabor', function (Blueprint $table) {
        $table->foreignId('pizza_id')->constrained()->cascadeOnDelete();
        $table->foreignId('sabor_id')->constrained('sabores')->cascadeOnDelete(); 
        $table->primary(['pizza_id', 'sabor_id']);
    });
}

    public function down()
    {
        Schema::dropIfExists('pizza_sabor');
    }
};