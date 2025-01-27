<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID column
            $table->string('project_name');  // Column for project name
            $table->string('category');  // Column for category
            $table->string('image');  // Column for image path
            $table->string('live_url');  // Column for live URL
            $table->string('github_url');  // Column for GitHub URL
            $table->json('technologies');  // Column for technologies (stored as JSON)
            $table->json('features');  // Column for features (stored as JSON)
            $table->timestamps();  // created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolios');
    }
}

