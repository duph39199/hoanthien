<?php

use App\Models\Product;
use App\Models\Product_color;
use App\Models\Product_size;
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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained(); // dùng để kết nối giữa bảng SP vs SPBT
            $table->foreignIdFor(Product_size::class)->constrained(); // dùng để kết nối giữa bảng SP vs SP_size
            $table->foreignIdFor(Product_color::class)->constrained(); // dùng để kết nối giữa bảng SP vs SP_colors
            $table->integer('quantity'); // số lưởng của sản phẩm biến thể này
            $table->string('image', 255)->nullable(); // ảnh của sản phẩm biến thể
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
