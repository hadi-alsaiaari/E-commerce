<?php

use App\Enums\OrderStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_email');

            $table->decimal('price', 8, 2);
            $table->decimal('shapping_price', 8, 2);
            $table->decimal('total_price', 8, 2);

            $table->text('note');
            $table->enum('status', OrderStatus::toArray())->default(OrderStatus::PENDING);

            $table->string('country');
            $table->string('governorate');
            $table->string('city');
            $table->string('street');

            $table->string('coupon')->nullable();
            $table->integer('coupon_discount')->default(0);

            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
