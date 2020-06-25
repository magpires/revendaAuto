<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Como eu disse como eu queria o nome da tabela lá na model Permissao, devo fazer o mesmo em sua migration
        Schema::create('permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
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
        // A mesma nomeclatura da tabela 'permissoes' deve ser adotada no método down()
        Schema::dropIfExists('permissoes');
    }
}
