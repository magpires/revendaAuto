<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Como eu disse como eu queria o nome da tabela lá na model Papel, devo fazer o mesmo em sua migration
        Schema::create('papeis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        // Abaixo teremos as tabelas pivores que irão ligar as permissões com os papéis
        // Note que para melhorarmos o código de nossa aplicação, evitando assim que tenhamos que fazer muitas configurações em nossa model, devemos criar o nome dessas tabelas que se relacionam em ordem alfabética, conforme é exigido pelos padrões do Laravel.
        // É recomendado também que as tabelas pivores sejam criadas com os nomes das models, e não com os nomes das tabelas as quais elas se relacionam. É um padrão exigido pelo Laravel e evita que tenhamos que fazer configurações extras nas models
        // Exemplo: Schema::create('modelA_modelB', function (Blueprint $table) {});
        Schema::create('papel_permissao', function (Blueprint $table) {
            $table->integer('permissao_id')->unsigned();
            $table->integer('papel_id')->unsigned();

            // Criando as chaves estrangeiras
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');

            // Aqui nós informamos ao Laravel quais são as chaves primárias desta tabela
            $table->primary(['permissao_id', 'papel_id']);
        });

        Schema::create('papel_user', function (Blueprint $table) {
            $table->integer('papel_id')->unsigned();
            $table->integer('user_id')->unsigned();

            // Criando as chaves estrangeiras
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Aqui nós informamos ao Laravel quais são as chaves primárias desta tabela
            $table->primary(['papel_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Obs1: A mesma nomeclatura da tabela 'papeis' deve ser adotada no método down()
        // Obs2: As tabelas pivores também devem estar no método de rollback down()
        // Obs3: A chamada dos métodos dropIfExists('nome_da_tabela') deve ser feita na ordem inversa ao que foi feito no método up()
        Schema::dropIfExists('papel_user');
        Schema::dropIfExists('papel_permissao');
        Schema::dropIfExists('papeis');
    }
}
