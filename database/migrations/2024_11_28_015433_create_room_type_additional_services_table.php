<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{RoomType,AdditionalService};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_type_additional_services', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(RoomType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(AdditionalService::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_type_additional_services');
    }
};
