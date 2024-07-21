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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('shipper');
            $table->string('image')->nullable();
            $table->float('weight');
            $table->integer('price');
            $table->text('description');
            $table->enum('status',[0,1,2])->default(0)->comment('0 => Pending ,1 => Progress,2 => Done');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
