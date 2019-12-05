<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class SeedCategoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name' => '分享',
                'description' => '分享知识',
            ],
            [
                'name' => '教程',
                'description' => '教程学习',
            ],
            [
                'name' => '问答',
                'description' => '友善互助',
            ],
            [
                'name' => '公告',
                'description' => '站点公告',
            ],
        ];
        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
