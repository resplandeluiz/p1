<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            
            $table->increments('id')->unsigned();
            
            $table->integer('categoria_id')->unsigned();
            
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias');
            
            $table->timestamp('data');
            
            $table->string('descricao');
            $table->string('valor');
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
        Schema::dropIfExists('pagamentos');
    }
}
