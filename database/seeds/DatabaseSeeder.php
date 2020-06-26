<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registe suas classes de seeds aqui, caso queira semear utilizando o comando php artisan db:seed
        // $this->call(NomeDaClasseSeeder::class);
        $this->call(PapelSeeder::class);
        $this->call(PermissaoSeeder::class);
    }
}
