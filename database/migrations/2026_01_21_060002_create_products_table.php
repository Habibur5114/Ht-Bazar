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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('product_name');

        $table->foreignId('category_id')
            ->constrained('categories')
            ->cascadeOnDelete();

        $table->foreignId('subcategory_id')
            ->nullable()
            ->constrained('subcategories')
            ->nullOnDelete();

        $table->foreignId('childcategory_id')
            ->nullable()
            ->constrained('child_categories')
            ->nullOnDelete();

        $table->foreignId('brand_id')
            ->nullable()
            ->constrained('brands')
            ->nullOnDelete();

        $table->decimal('purchase_price', 10, 2);
        $table->decimal('old_price', 10, 2)->nullable();
        $table->decimal('new_price', 10, 2);

        $table->integer('stock')->default(0);

        $table->json('image')->nullable();
        $table->string('product_unit')->nullable();
        $table->string('product_video')->nullable();

        $table->json('size')->nullable();
        $table->json('color')->nullable();

        $table->longText('description')->nullable();

        $table->boolean('status')->default(1);
        $table->boolean('feature_product')->default(0);
        $table->boolean('best_selling')->default(0);
        $table->boolean('offer')->default(0);

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
