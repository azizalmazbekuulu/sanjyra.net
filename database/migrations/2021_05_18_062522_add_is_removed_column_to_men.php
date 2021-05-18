<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRemovedColumnToMen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('men', function (Blueprint $table) {
            if(!Schema::hasColumn('men', 'is_removed')) {
                $table->boolean('is_removed')->nullable()->after('image');
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
        Schema::table('men', function (Blueprint $table) {
            if(Schema::hasColumn('men', 'is_removed')) {
                $table->dropColumn('is_removed');
            }
        });
    }
}
