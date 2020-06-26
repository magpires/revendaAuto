<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permissões relacionadas a Usuários
        $usuarios1 = Permissao::firstOrCreate([
            'nome' => 'usuario-view',
            'descricao' => 'Acesso a lista de usuários'
        ]);

        $usuarios2 = Permissao::firstOrCreate([
            'nome' => 'usuario-create',
            'descricao' => 'Adicionar Usuários'
        ]);

        $usuarios3 = Permissao::firstOrCreate([
            'nome' => 'usuario-edit',
            'descricao' => 'Editar Usuários'
        ]);
        
        $usuarios4 = Permissao::firstOrCreate([
            'nome' => 'usuario-delete',
            'descricao' => 'Deletar Usuários'
        ]);

        // Permissões relacionadas a Papéis
        $papeis1 = Permissao::firstOrCreate([
            'nome' => 'papel-view',
            'descricao' => 'Listar Papéis'
        ]);

        $papeis2 = Permissao::firstOrCreate([
            'nome' => 'papel-create',
            'descricao' => 'Adicionar Papéis'
        ]);

        $papeis3 = Permissao::firstOrCreate([
            'nome' => 'papel-edit',
            'descricao' => 'Editar Papéis'
        ]);

        $papeis4 = Permissao::firstOrCreate([
            'nome' => 'papel-delete',
            'descricao' => 'Deletar Papéis'
        ]);

        // Permissões relacionadas a Favoritos
        $favoritos1 = Permissao::firstOrCreate([
            'nome' => 'favorito-view',
            'descricao' => 'Acesso aos favoritos'
        ]);

        // Permissões relacionadas a perfil
        $perfil1 = Permissao::firstOrCreate([
            'nome' => 'perfil-view',
            'descricao' => 'Acesso ao perfil'
        ]);

        // Permissões relacionadas a Chamados
        $chamados1 = Permissao::firstOrCreate([
            'nome' => 'chamado-view',
            'descricao' => 'Listar Chamados'
        ]);

        $chamados2 = Permissao::firstOrCreate([
            'nome' => 'chamado-create',
            'descricao' => 'Adicionar Chamados'
        ]);

        $chamados3 = Permissao::firstOrCreate([
            'nome' => 'chamado-edit',
            'descricao' => 'Editar Chamados'
        ]);

        $pchamados4 = Permissao::firstOrCreate([
            'nome' => 'chamado-delete',
            'descricao' => 'Deletar Chamados'
        ]);

        echo "Registro de Permissoes criados no sistema";
    }
}
