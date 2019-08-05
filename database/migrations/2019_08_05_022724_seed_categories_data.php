<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
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
                'name'        => 'share',
                'description' => 'share creation, share discovery',
            ],
            [
                'name'        => 'course',
                'description' => 'development, extension packs',
            ],
            [
                'name'        => 'QA',
                'description' => 'Please keep kindness and helpfulness',
            ],
            [
                'name'        => 'notice',
                'description' => 'bbs notice',
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
