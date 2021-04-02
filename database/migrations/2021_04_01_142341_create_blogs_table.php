<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('image');
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->foreignIdFor(\App\Models\BlogStatus::class, 'blog_status_id');
//            $table->dropForeign('blogs_category_id_foreign');
//            $table->foreign('category_id')
//                ->references('id')
//                ->on('categories')
//                ->onDelete('cascade');

            $table->foreignIdFor(\App\Models\Category::class)->constrained('categories')->cascadeOnDelete();
            $table->dateTime('published_at');
            $table->boolean('is_featured');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
