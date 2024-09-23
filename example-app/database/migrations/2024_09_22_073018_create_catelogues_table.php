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
        Schema::create('catelogues', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // tên danh mục
            $table->string('cover', 255)->nullable(); // đường dẫn đến file ảnh
            $table->boolean('is_active')->default(true); // để xem danh mục có đang hoạt động hay không
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catelogues');
    }
};
