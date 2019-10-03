<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('s_addr_numb', 45)
                ->after('s_address'); // Ordenado após a coluna "s_address"
            $table->string('b_addr_numb', 45)
                ->after('b_zip'); // Ordenado após a coluna "b_zip"
            $table->string('s_area_code', 10)
                ->after('s_number'); // Ordenado após a coluna "s_number"
            $table->string('b_area_code', 45)
                ->after('b_number'); // Ordenado após a coluna "b_zip"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn('s_addr_numb');
            $table->dropColumn('b_addr_numb');
            $table->dropColumn('s_area_code');
            $table->dropColumn('b_area_code');
        });
    }
}
