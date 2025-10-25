<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('tanggal')->default(DB::raw('CURRENT_DATE'));
            $table->string('slug');
            // $table->string('author_id');
            // $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('author_id');
            // $table->foreign('author_id')->references('id')->on('users');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id',
            );

            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_category_id',
            );
            // $table->foreign('category_id')->references('id')->on('categories');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
