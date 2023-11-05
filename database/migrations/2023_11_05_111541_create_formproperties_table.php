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
        Schema::create('formproperties', function (Blueprint $table) {
            $table->id();
            $table->string('type', 45);
            $table->string('label',2000);
            $table->longText('data')->nullable();
            $table->foreignIdFor(\App\Models\Dynamicform::class, 'dynamicforms_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formproperties');
    }
};
