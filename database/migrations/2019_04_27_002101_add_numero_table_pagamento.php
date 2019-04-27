<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNumeroTablePagamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pagamentos', function (Blueprint $table) {
            
            $table->string('numero',10)->nullable()->after('descricao');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagamentos', function (Blueprint $table) {
            
            $table->dropColumn('numero');
            
        });
    }
}
