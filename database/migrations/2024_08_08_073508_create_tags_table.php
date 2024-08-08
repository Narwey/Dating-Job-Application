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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Job::class , 'job_listing_id')->constrained('job_listing')->cascadeOnDelete();
            $table -> foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();
            // this way it will try to create a foreignKey for a table named job but we do not have that we have Job_listing so we need to override it $column = 'name ,
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
