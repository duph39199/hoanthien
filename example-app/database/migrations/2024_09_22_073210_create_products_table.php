<?php

use App\Models\Catelogue;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Catelogue::class)->constrained(); // để kết nối mqh giữa bảng SP vs DM
            $table->string('name');  // tên sản phẩm
            $table->double('price'); // giá gốc sản phẩm
            $table->double('price_sale'); // giá sản phẩm khi giảm giá
            $table->text('content')->nullable(); // nội dung chi tiết về sp
            $table->integer('quantity')->nullable(); // số lượng sản phẩm
            $table->string('description')->nullable(); // mô tả về sản phẩm
            $table->string('image')->nullable(); // ảnh chính của sản phẩm
            $table->string('slug')->unique(); // để lưu trữ URL thân thiện
            $table->string('sku')->unique(); // để lưu mã sản phẩm
            $table->string('material')->nullable(); // chất liệu của sản phẩm
            $table->string('user_manual')->nullable(); // lưu trữ đường dẫn hoặc hướng đẫn sd
            $table->boolean('is_active')->default(true); // trạng thái hoạt động của sản phẩm
            $table->unsignedBigInteger('view')->default(0); // số lượt xem của sản phẩm
            $table->boolean('is_hot_deal')->default(false); // xác định sản phẩm vd: sp hot hoặc sp flale
            $table->boolean('is_good_deal')->default(false); // xác định liệu sản phẩm có phải là sản phẩm tốt (đang được quảng bá với giá tốt)
            $table->boolean('is_new')->default(false); // xác định liệu sản phẩm có phải là sản phẩm mới hay không
            $table->boolean('is_show_home')->default(false); // xác định liệu sản phẩm có hiển thị trên trang chủ không
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
