<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Offer,State};

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(Offer::class)->nullable();
            $table->foreignIdFor(State::class);
            $table->text('first_name');
            $table->text('last_name')->nullable();
            $table->text('phone');
            $table->text('email')->nullable();
            $table->text('address');
            $table->text('apt_suite')->nullable();
            $table->text('city')->nullable();
            $table->text('zip')->nullable();
            $table->dateTime('order_at');
            $table->string('comment')->nullable();
            $table->boolean('is_read')->default(false);
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
