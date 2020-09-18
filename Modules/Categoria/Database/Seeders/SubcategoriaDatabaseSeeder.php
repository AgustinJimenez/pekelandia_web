<?php namespace Modules\Categoria\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class SubcategoriaDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		/**
		 * Subcategoria Seeders
		 */
		
		//Educación
		$categoria_educacion = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Educacion%')->first();
		
		if (!empty($categoria_educacion)) {

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Kinder',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_educacion->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Guarderías',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_educacion->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Estimulación Temprana',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_educacion->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Colegio',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_educacion->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Talleres',
				'tiene_hijos'=>'1',
				'categoria_id'=>$categoria_educacion->id
				]);

		}
		
		//Salud
		$categoria_salud = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Salud%')->first();

		if (!empty($categoria_salud)) {
			
			DB::table('categoria__subcategorias')->insert([
			'nombre'=>'Odontopediatra',
			'tiene_hijos'=>'0',
			'categoria_id'=>$categoria_salud->id
			]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Fonoaudiologa',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Oftalmologa',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Psicopedagoga',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Productos para embarazadas y niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Pediatras',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Centros de rehabilitación',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Opticas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Clinica de pediculosis para niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Niños celiacos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Nutricionista para niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Psicologa infantil - Eneuresis',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Problemas de fertilidad',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Prematuros',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_salud->id
				]);
			
		}

		//Belleza
		$categoria_belleza = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Belleza%')->first();

		if (!empty($categoria_belleza)) {

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Boutiques',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_belleza->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Blanqueria - Ajuar bebes',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_belleza->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Peluquerías',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_belleza->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Spa',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_belleza->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Tienda de ropas y accesorios',
				'tiene_hijos'=>'1',
				'categoria_id'=>$categoria_belleza->id
				]);

		}

		//Juguetería
		$categoria_jugueteria = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Juguetería%')->first();

		if (!empty($categoria_jugueteria)) {
			
			DB::table('categoria__subcategorias')->insert([
			'nombre'=>'Juguetería didáctica',
			'tiene_hijos'=>'0',
			'categoria_id'=>$categoria_jugueteria->id
			]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Juegos de madera',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_jugueteria->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Jueguetería',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_jugueteria->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Parques infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_jugueteria->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Disfraces',
				'tiene_hijos'=>'1',
				'categoria_id'=>$categoria_jugueteria->id
				]);
			
		}

		//Fiestas Infantiles
		$categoria_fiestas = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Fiestas infantiles%')->first();

		if (!empty($categoria_fiestas)) {
			

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Parques infantiles de cumpleaños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Tarjetería y souvenirs',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Cotillón y disfraces',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Fotografía',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Organización de eventos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Animación de fiestas infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Globo loco',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Caritas pintadas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Servicio de comidas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Servicio de helados,golosinas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Servicio de mozos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Servicio de asado',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Fiestas infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Dormitorios infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Exposiciones',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Eventos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_fiestas->id
				]);

		}

		//Maternidad
		$categoria_maternidad = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Maternidad%')->first();

		if (!empty($categoria_maternidad)) {
			
			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Gym para embarazadas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Lactancia materna',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Yoga',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Cuidados del bebé',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Bebés prematuros',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Desarrollo del bebé',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Alimentación del bebé',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_maternidad->id
				]);

		}

		//Padres
		$categoria_padres = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Padres%')->first();

		if (!empty($categoria_padres)) {

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Charlas para padres',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_padres->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Escuela para padres',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_padres->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Terapia para parejas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_padres->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Terapia para niños/adolescentes',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_padres->id
				]);

		}

		//Peke Ocio
		$categoria_pekeocio = DB::table('categoria__categorias')->where('nombre', 'LIKE', '%Peke Ocio%')->first();

		if (!empty($categoria_pekeocio)) {
			
			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Adivinanzas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Trabalenguas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Chistes para niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Dibujos para colorear',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Cuentos infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Cuentos en inglés',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Juegos para niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Rimas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Poesias',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Rompecabezas',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Libros',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Manualidades',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Canciones infantiles',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Experimentos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Juegos matemáticos',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Juegos de lectoescritura',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Juegos de lectoescritura',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Code - programación para niños',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

			DB::table('categoria__subcategorias')->insert([
				'nombre'=>'Videos de interés',
				'tiene_hijos'=>'0',
				'categoria_id'=>$categoria_pekeocio->id
				]);

		}

	}

}