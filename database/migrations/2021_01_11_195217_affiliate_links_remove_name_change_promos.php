<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AffiliateLinksRemoveNameChangePromos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_links', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('promotion');
            $table->dateTime('promotion_start')->nullable();
            $table->dateTime('promotion_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_links', function (Blueprint $table) {
            //
        });
    }
}
