<?php namespace Modules\Anuncios\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class AnunciosDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		DB::table('anuncios__publicidads')->insert([
			'titulo'=>'Plan Básico',
			'descripcion'=>'Sección de Publicaciones, Artículos, Eventos o Promociones',
			'plan'=>'Precio regular Gs. 400.000/mes*',
			'orden' => 1
			]);

		DB::table('anuncios__publicidads')->insert([
			'titulo'=>'Plan Medio',
			'descripcion'=>'Página de Inicio',
			'plan'=>'Precio regular Gs. 800.000/mes*',
			'orden' => 2
			]);

		DB::table('anuncios__publicidads')->insert([
			'titulo'=>'Plan Premium',
			'descripcion'=>'Banner Superior',
			'plan'=>'¡Precio regular Gs. 1.000.000/mes*',
			'orden' => 3
			]);

		DB::table('anuncios__publicidads')->insert([
			'titulo'=>'Plan Revista',
			'descripcion'=>'Sección Revistas',
			'plan'=>'Precio regular Gs. 200.000/mes*',
			'orden' => 4
			]);

		DB::table('anuncios__publicidads')->insert([
			'titulo'=>'Plan Empresa',
			'descripcion'=>'Sección Empresas',
			'plan'=>'Precio regular Gs. 200.000/mes*',
			'orden' => 5
			]);

	}

}