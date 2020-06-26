<?php

use Illuminate\Database\Seeder;
use App\Papel;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    // Vamos semear o banco com alguns papéis para que o nosso sistema já venha com estes ditos papeis pré-configurados
    public function run() {
        // O método firstOrCreate([array]) serve para evitar que criemos um papel mais de uma vez. Assim sendo, ele só irá criar, por exemplo, um papel de Admin, não importa quantas vezes rodamos o comando para semear no banco.
        $p1 = Papel::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Acesso total ao sistema'
        ]);

        $p2 = Papel::firstOrCreate([
            'nome' => 'Gerente',
            'descricao' => 'Gerenciamento do sistema'
        ]);

        $p1 = Papel::firstOrCreate([
            'nome' => 'Usuario',
            'descricao' => 'Acesso ao site como usuário'
        ]);

        // Você também pode informar uma mensagem no console após rodar o comando de seed.
        echo "Papeis criados com sucesso";
    }

    // Existem dois comandos que podemos utilizar para semear no banco.

    // O primeiro comando é: php artisan db:seed
    // Este comando roda uma classe padrão de seeds, a DatabaseSeeder. Usando este comando, devemos, antes de mais nada, registrar as seeders criadas por nós na classe DatabaseSeeder.

    // O segundo comando é: php artisan db:seed --class=NomeDaClasseSeeder
    // Com este comando, já não se faz necessário registrar nossas seeders na classe DatabaseSeeder.
}
