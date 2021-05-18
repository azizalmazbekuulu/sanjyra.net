<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRemovedColumnToWomen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('women', function (Blueprint $table) {
            if(!Schema::hasColumn('women', 'is_removed')) {
                $table->boolean('is_removed')->default('0')->after('info');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('women', function (Blueprint $table) {
            if(Schema::hasColumn('women', 'is_removed')) {
                $table->dropColumn('is_removed');
            }
        });
    }
}
