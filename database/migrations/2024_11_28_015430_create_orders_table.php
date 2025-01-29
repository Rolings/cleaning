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
            $table->string('token')->index()->unique();
            $table->foreignIdFor(Offer::class)->nullable();
            $table->foreignIdFor(State::class);
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('apt_suite')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->dateTime('order_at');
            $table->text('comment')->nullable();
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
