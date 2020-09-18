<?php namespace Modules\Categoria\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class SubsubcategoriaDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**
		 * Subsubcategorias
		 */
		
		//Talleres
		$categoria_talleres = DB::table('categoria__subcategorias')->where('nombre', 'LIKE', '%Talleres%')->first();

		if (!empty($categoria_talleres)) {

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Danzas',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Fútbol',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Arte',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Computación',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Natación',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Patinaje',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Música',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Idiomas',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Robótica',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Taekwondo',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Ajedrez',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Psicomotricidad',
				'subcategoria_id'=>$categoria_talleres->id
				]);

		}

		//Disfraces
		$categoria_talleres = DB::table('categoria__subcategorias')->where('nombre', 'LIKE', '%Disfraces%')->first();

		if (!empty($categoria_talleres)) {

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Alquiler de disfraces',
				'subcategoria_id'=>$categoria_talleres->id
				]);

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Alquiler de parques infantiles',
				'subcategoria_id'=>$categoria_talleres->id
				]);

		}

		//Tienda de ropas y accesorios
		$categoria_tienda = DB::table('categoria__subcategorias')->where('nombre', 'LIKE', '%Tienda de ropas y accesorios%')->first();

		if (!empty($categoria_tienda)) {

			DB::table('categoria__subsubcategorias')->insert([
				'nombre'=>'Accesorios para bebés y niños',
				'subcategoria_id'=>$categoria_tienda->id
				]);

		}
		

	}

}