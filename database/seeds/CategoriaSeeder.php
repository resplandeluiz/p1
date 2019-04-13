<?php

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('categorias')->insert([ 'nome' => "Alimentação" ]);
         DB::table('categorias')->insert([ 'nome' => "Transporte" ]);
         DB::table('categorias')->insert([ 'nome' => "Saúde" ]);
         DB::table('categorias')->insert([ 'nome' => "Lazer" ]);
         DB::table('categorias')->insert([ 'nome' => "Moradia" ]);
    }
}
