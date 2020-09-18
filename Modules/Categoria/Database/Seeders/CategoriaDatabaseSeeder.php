<?php namespace Modules\Categoria\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class CategoriaDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**
		 * Categorias Seeder
		 */
		
		DB::table('categoria__categorias')->insert([
			'nombre'=>'Educación',
			'orden'=>'1',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Salud',
			'orden'=>'2',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Belleza',
			'orden'=>'3',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Juguetería',
			'orden'=>'4',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Fiestas infantiles',
			'orden'=>'5',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Maternidad',
			'orden'=>'6',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Padres',
			'orden'=>'7',
			'menu'=>'1'
			]);

		DB::table('categoria__categorias')->insert([
			'nombre'=>'Peke Ocio',
			'orden'=>'8',
			'menu'=>'1'
			]);

		$this->call(SubcategoriaDatabaseSeeder::class);
		$this->call(SubsubcategoriaDatabaseSeeder::class);
		
	}

}