<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('user_id')->after('id')
                                        ->constrained('users')
                                        ->cascadeOnUpdate()
                                        ->restrictOnDelete();
        });

        Schema::table('reviews', function(Blueprint $table) {
            $table->foreignId('user_id')->after('id')
                                        ->constrained('users')
                                        ->cascadeOnUpdate()
                                        ->restrictOnDelete();

            $table->foreignId('post_id')->after('id')
                                        ->constrained('posts')
                                        ->cascadeOnUpdate()
                                        ->restrictOnDelete();
        });

        Schema::table('likes', function(Blueprint $table) {
            $table->foreignId('user_id')->after('id')
                                        ->constrained('users')
                                        ->cascadeOnUpdate()
                                        ->restrictOnDelete();

            $table->foreignId('post_id')->after('id')
                                        ->constrained('posts')
                                        ->cascadeOnUpdate()
                                        ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('reviews', function(Blueprint $table) {
            $table->dropForeign('reviews_user_id_foreign');
            $table->dropForeign('reviews_post_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('post_id');
        });

        Schema::table('likes', function(Blueprint $table) {
            $table->dropForeign('likes_user_id_foreign');
            $table->dropForeign('likes_post_id_foreign');

            $table->dropColumn('user_id');
            $table->dropColumn('post_id');
        });
    }
};
