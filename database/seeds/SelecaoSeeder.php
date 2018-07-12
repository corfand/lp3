<?php

use Illuminate\Database\Seeder;

class SelecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(App\Selecao::class)->create(['name' => 'Russia']);
        factory(App\Selecao::class)->create(['name' => 'Saudi Arabia']);
        factory(App\Selecao::class)->create(['name' => 'Egypt']);
        factory(App\Selecao::class)->create(['name' => 'Uruguay']);

        factory(App\Selecao::class)->create(['name' => 'Portugal']);
        factory(App\Selecao::class)->create(['name' => 'Spain']);
        factory(App\Selecao::class)->create(['name' => 'Morocco']);
        factory(App\Selecao::class)->create(['name' => 'IR Iran']);

        factory(App\Selecao::class)->create(['name' => 'France']);
        factory(App\Selecao::class)->create(['name' => 'Australia']);
        factory(App\Selecao::class)->create(['name' => 'Peru']);
        factory(App\Selecao::class)->create(['name' => 'Denmark']);

        factory(App\Selecao::class)->create(['name' => 'Argentina']);
        factory(App\Selecao::class)->create(['name' => 'Iceland']);
        factory(App\Selecao::class)->create(['name' => 'Croatia']);
        factory(App\Selecao::class)->create(['name' => 'Nigeria']);

        factory(App\Selecao::class)->create(['name' => 'Brazil']);
        factory(App\Selecao::class)->create(['name' => 'Switzerland']);
        factory(App\Selecao::class)->create(['name' => 'Costa Rica']);
        factory(App\Selecao::class)->create(['name' => 'Serbia']);

        factory(App\Selecao::class)->create(['name' => 'Germany']);
        factory(App\Selecao::class)->create(['name' => 'Mexico']);
        factory(App\Selecao::class)->create(['name' => 'Sweden']);
        factory(App\Selecao::class)->create(['name' => 'Korea Republic']);

        factory(App\Selecao::class)->create(['name' => 'Belgium']);
        factory(App\Selecao::class)->create(['name' => 'Panama']);
        factory(App\Selecao::class)->create(['name' => 'Tunisia']);
        factory(App\Selecao::class)->create(['name' => 'England']);

        factory(App\Selecao::class)->create(['name' => 'Poland']);
        factory(App\Selecao::class)->create(['name' => 'Senegal']);
        factory(App\Selecao::class)->create(['name' => 'Colombia']);
        factory(App\Selecao::class)->create(['name' => 'Japan']);

    }
}
