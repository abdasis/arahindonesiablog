<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('judul_artikel', 150);
            $table->string('slug', 150);
            $table->longText('isi_artikel')->nullable();
            $table->string('excerpt_artikel', 100);
            $table->string('status_artikel', 100);
            $table->string('jumlah_komentar', 100);
            $table->string('thumbnail_artikel', 100)->default('default-thumbnail.png');
            $table->string('kategori_artikel', 100)->nullable();
            $table->foreignId('user_id')->constrained()->ondDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
