<?php

use App\Models\Order;
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
            $table->id('order_id');
            $table->string('name');
            $table->integer("price")->default(1000);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Order::create([
            'name' => 'Teszt1',
            'price' => 500,
            'user_id' => 1
        ]);

        Order::create([
            'name' => 'Teszt2',
            'price' => 1500,
            'user_id' => 2
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
