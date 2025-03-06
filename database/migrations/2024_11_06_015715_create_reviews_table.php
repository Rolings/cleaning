<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{File,Service};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(File::class,'image_id')->nullable();
            $table->foreignIdFor(Service::class)->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('comment');
            $table->enum('rating',[1,2,3,4,5])->default(5);
            $table->boolean('active')->default(true);
            $table->boolean('approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
