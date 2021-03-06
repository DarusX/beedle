<?php

use Illuminate\Database\Seeder;
use App\State;
use App\Color;
use App\Brand;
use App\Category;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        Role::create(['role' => 'Administrador'])->users()->create([
            'name' => 'Administrador',
            'lastname' => 'Webby',
            'email' => 'admin@webby.mx',
            'password' => bcrypt('123456')
        ]);
        Role::create(['role' => 'Vendedor']);
        Role::create(['role' => 'Cliente']);
        /*
        $colors = [
            ['color' => 'Rojo'],
            ['color' => 'Rosa'],
            ['color' => 'Dorado'],
            ['color' => 'Negro'],
            ['color' => 'Plateado'],
            ['color' => 'Gris'],
        ];
        foreach ($colors as $color) {
            Color::create($color);
        }
        Brand::create([
            'brand' => 'tu case'
        ]);
        Category::create([
            'category' => 'Fundas' 
        ]);
        */
        State::create([
           'state' => 'Aguascalientes'
        ])->municipalities()->createMany([
            ['municipality' => 'Aguascalientes'], 
            ['municipality' => 'Asientos'], 
            ['municipality' => 'Calvillo'], 
            ['municipality' => 'Cosío'], 
            ['municipality' => 'Jesús María'], 
            ['municipality' => 'Pabellón de Arteaga'], 
            ['municipality' => 'Rincón de Romos'], 
            ['municipality' => 'San José de Gracia'], 
            ['municipality' => 'Tepezalá'], 
            ['municipality' => 'El Llano'], 
            ['municipality' => 'San Francisco de los Romo']
        ]);
        State::create([
           'state' => 'Baja California'
        ])->municipalities()->createMany([
            ['municipality' => 'Ensenada'], 
            ['municipality' => 'Mexicali'], 
            ['municipality' => 'Tecate'], 
            ['municipality' => 'Tijuana'], 
            ['municipality' => 'Playas de Rosarito'], 
        ]);
        State::create([
           'state' => 'Baja California Sur'
        ])->municipalities()->createMany([
            ['municipality' => 'Comondú'], 
            ['municipality' => 'Mulegé'], 
            ['municipality' => 'La Paz'], 
            ['municipality' => 'San José del Cabo'], 
            ['municipality' => 'Loreto'], 
        ]);
        State::create([
           'state' => 'Campeche'
        ])->municipalities()->createMany([
            ['municipality' => 'Calkiní'],
            ['municipality' => 'Campeche'],
            ['municipality' => 'Carmen'],
            ['municipality' => 'Champotón'],
            ['municipality' => 'Hecelchakán'],
            ['municipality' => 'Hopelchén'],
            ['municipality' => 'Palizada'],
            ['municipality' => 'Tenabo'],
            ['municipality' => 'Escárcega'],
            ['municipality' => 'Calakmul'],
            ['municipality' => 'Candelaria'],
        ]);
        State::create([
            'state' => 'Chiapas'
        ])->municipalities()->createMany([
            ['municipality' => 'Acacoyagua'], 
            ['municipality' => 'Acala'], 
            ['municipality' => 'Acapetahua'], 
            ['municipality' => 'Altamirano'], 
            ['municipality' => 'Amatán'], 
            ['municipality' => 'Amatenango de la Frontera'], 
            ['municipality' => 'Amatenango del Valle'], 
            ['municipality' => 'Ángel Albino Corzo'], 
            ['municipality' => 'Arriaga'], 
            ['municipality' => 'Bejucal de Ocampo'], 
            ['municipality' => 'Bella Vista'], 
            ['municipality' => 'Berriozábal'], 
            ['municipality' => 'Bochil'], 
            ['municipality' => 'El Bosque'], 
            ['municipality' => 'Cacahoatán'], 
            ['municipality' => 'Catazajá'], 
            ['municipality' => 'Cintalapa'], 
            ['municipality' => 'Coapilla'], 
            ['municipality' => 'Comitán de Domínguez'], 
            ['municipality' => 'La Concordia'], 
            ['municipality' => 'Copainalá'], 
            ['municipality' => 'Chalchihuitán'], 
            ['municipality' => 'Chamula'], 
            ['municipality' => 'Chanal'], 
            ['municipality' => 'Chapultenango'], 
            ['municipality' => 'Chenalhó'], 
            ['municipality' => 'Chiapa de Corzo'], 
            ['municipality' => 'Chiapilla'], 
            ['municipality' => 'Chicoasén'], 
            ['municipality' => 'Chicomuselo'], 
            ['municipality' => 'Chilón'], 
            ['municipality' => 'Escuintla'], 
            ['municipality' => 'Francisco León'], 
            ['municipality' => 'Frontera Comalapa'], 
            ['municipality' => 'Frontera Hidalgo'], 
            ['municipality' => 'La Grandeza'], 
            ['municipality' => 'Huehuetán'], 
            ['municipality' => 'Huixtán'], 
            ['municipality' => 'Huitiupán'], 
            ['municipality' => 'Huixtla'], 
            ['municipality' => 'La Independencia'], 
            ['municipality' => 'Ixhuatán'], 
            ['municipality' => 'Ixtacomitán'], 
            ['municipality' => 'Ixtapa'], 
            ['municipality' => 'Ixtapangajoya'], 
            ['municipality' => 'Jiquipilas'], 
            ['municipality' => 'Jitotol'], 
            ['municipality' => 'Juárez'], 
            ['municipality' => 'Larráinzar'], 
            ['municipality' => 'La Libertad'], 
            ['municipality' => 'Mapastepec'], 
            ['municipality' => 'Las Margaritas'], 
            ['municipality' => 'Mazapa de Madero'], 
            ['municipality' => 'Mazatán'], 
            ['municipality' => 'Metapa'], 
            ['municipality' => 'Mitontic'], 
            ['municipality' => 'Motozintla'], 
            ['municipality' => 'Nicolás Ruíz'], 
            ['municipality' => 'Ocosingo'], 
            ['municipality' => 'Ocotepec'], 
            ['municipality' => 'Ocozocoautla de Espinosa'], 
            ['municipality' => 'Ostuacán'], 
            ['municipality' => 'Osumacinta'], 
            ['municipality' => 'Oxchuc'], 
            ['municipality' => 'Palenque'], 
            ['municipality' => 'Pantelhó'], 
            ['municipality' => 'Pantepec'], 
            ['municipality' => 'Pichucalco'], 
            ['municipality' => 'Pijijiapan'], 
            ['municipality' => 'El Porvenir'], 
            ['municipality' => 'Villa Comaltitlán'], 
            ['municipality' => 'Pueblo Nuevo Solistahuacán'], 
            ['municipality' => 'Rayón'], 
            ['municipality' => 'Reforma'], 
            ['municipality' => 'Las Rosas'], 
            ['municipality' => 'Sabanilla'], 
            ['municipality' => 'Salto de Agua'], 
            ['municipality' => 'San Cristóbal de las Casas'], 
            ['municipality' => 'San Fernando'], 
            ['municipality' => 'Siltepec'], 
            ['municipality' => 'Simojovel'], 
            ['municipality' => 'Sitalá'], 
            ['municipality' => 'Socoltenango'], 
            ['municipality' => 'Solosuchiapa'], 
            ['municipality' => 'Soyaló'], 
            ['municipality' => 'Suchiapa'], 
            ['municipality' => 'Suchiate'], 
            ['municipality' => 'Sunuapa'], 
            ['municipality' => 'Tapachula'], 
            ['municipality' => 'Tapalapa'], 
            ['municipality' => 'Tapilula'], 
            ['municipality' => 'Tecpatán'], 
            ['municipality' => 'Tenejapa'], 
            ['municipality' => 'Teopisca'], 
            ['municipality' => 'Tila'], 
            ['municipality' => 'Tonalá'], 
            ['municipality' => 'Totolapa'], 
            ['municipality' => 'La Trinitaria'], 
            ['municipality' => 'Tumbalá'], 
            ['municipality' => 'Tuxtla Gutiérrez'], 
            ['municipality' => 'Tuxtla Chico'], 
            ['municipality' => 'Tuzantán'], 
            ['municipality' => 'Tzimol'], 
            ['municipality' => 'Unión Juárez'], 
            ['municipality' => 'Venustiano Carranza'], 
            ['municipality' => 'Villa Corzo'], 
            ['municipality' => 'Villaflores'], 
            ['municipality' => 'Yajalón'], 
            ['municipality' => 'San Lucas'], 
            ['municipality' => 'Zinacantán'], 
            ['municipality' => 'San Juan Cancuc'], 
            ['municipality' => 'Aldama'], 
            ['municipality' => 'Benemérito de las Américas'], 
            ['municipality' => 'Maravilla Tenejapa'], 
            ['municipality' => 'Marqués de Comillas'], 
            ['municipality' => 'Montecristo de Guerrero'], 
            ['municipality' => 'San Andrés Duraznal'], 
            ['municipality' => 'Santiago el Pinar'], 
            ['municipality' => 'Capitán Luis Ángel Vidal'], 
            ['municipality' => 'Rincón Chamula San Pedro'], 
            ['municipality' => 'El Parral'], 
            ['municipality' => 'Emiliano Zapata'], 
            ['municipality' => 'Mezcalapa'], 
            ['municipality' => 'Belisario Dominguez'], 
        ]);
        State::create([
            'state' => 'Chihuahua'
        ])->municipalities()->createMany([
            ['municipality' => 'Ahumada'],
            ['municipality' => 'Aldama'],
            ['municipality' => 'Allende'],
            ['municipality' => 'Aquiles Serdán'],
            ['municipality' => 'Ascensión'],
            ['municipality' => 'Bachíniva'],
            ['municipality' => 'Balleza'],
            ['municipality' => 'Batopilas de Manuel Gómez Morín'],
            ['municipality' => 'Bocoyna'],
            ['municipality' => 'Buenaventura'],
            ['municipality' => 'Camargo'],
            ['municipality' => 'Carichí'],
            ['municipality' => 'Casas Grandes'],
            ['municipality' => 'Coronado'],
            ['municipality' => 'Coyame del Sotol'],
            ['municipality' => 'La Cruz'],
            ['municipality' => 'Cuauhtémoc'],
            ['municipality' => 'Cusihuiriachi'],
            ['municipality' => 'Chihuahua'],
            ['municipality' => 'Chínipas'],
            ['municipality' => 'Delicias'],
            ['municipality' => 'Dr. Belisario Domínguez'],
            ['municipality' => 'Galeana'],
            ['municipality' => 'Santa Isabel'],
            ['municipality' => 'Gómez Farías'],
            ['municipality' => 'Gran Morelos'],
            ['municipality' => 'Guachochi'],
            ['municipality' => 'Guadalupe'],
            ['municipality' => 'Guadalupe y Calvo'],
            ['municipality' => 'Guazapares'],
            ['municipality' => 'Guerrero'],
            ['municipality' => 'Hidalgo del Parral'],
            ['municipality' => 'Huejotitán'],
            ['municipality' => 'Ignacio Zaragoza'],
            ['municipality' => 'Janos'],
            ['municipality' => 'Jiménez'],
            ['municipality' => 'Juárez'],
            ['municipality' => 'Julimes'],
            ['municipality' => 'López'],
            ['municipality' => 'Madera'],
            ['municipality' => 'Maguarichi'],
            ['municipality' => 'Manuel Benavides'],
            ['municipality' => 'Matachí'],
            ['municipality' => 'Matamoros'],
            ['municipality' => 'Meoqui'],
            ['municipality' => 'Morelos'],
            ['municipality' => 'Moris'],
            ['municipality' => 'Namiquipa'],
            ['municipality' => 'Nonoava'],
            ['municipality' => 'Nuevo Casas Grandes'],
            ['municipality' => 'Ocampo'],
            ['municipality' => 'Ojinaga'],
            ['municipality' => 'Práxedis G. Guerrero'],
            ['municipality' => 'Riva Palacio'],
            ['municipality' => 'Rosales'],
            ['municipality' => 'Rosario'],
            ['municipality' => 'San Francisco de Borja'],
            ['municipality' => 'San Francisco de Conchos'],
            ['municipality' => 'San Francisco del Oro'],
            ['municipality' => 'Santa Bárbara'],
            ['municipality' => 'Satevó'],
            ['municipality' => 'Saucillo'],
            ['municipality' => 'Temósachi'],
            ['municipality' => 'El Tule'],
            ['municipality' => 'Urique'],
            ['municipality' => 'Uruachi'],
            ['municipality' => 'Valle de Zaragoza'],
        ]);
        State::create([
            'state' => 'Ciudad de México'
        ])->municipalities()->createMany([
            ['municipality' => 'Álvaro Obregón'],
            ['municipality' => 'Azcapotzalco'],
            ['municipality' => 'Benito Juárez'],
            ['municipality' => 'Coyoacán'],
            ['municipality' => 'Cuajimalpa de Morelos'],
            ['municipality' => 'Cuauhtémoc'],
            ['municipality' => 'Gustavo A. Madero'],
            ['municipality' => 'Iztacalco'],
            ['municipality' => 'Iztapalapa'],
            ['municipality' => 'Magdalena Contreras'],
            ['municipality' => 'Miguel Hidalgo'],
            ['municipality' => 'Milpa Alta'],
            ['municipality' => 'Tláhuac'],
            ['municipality' => 'Tlalpan'],
            ['municipality' => 'Venustiano Carranza'],
            ['municipality' => 'Xochimilco'],
        ]);
        State::create([
            'state' => 'Coahuila de Zaragoza'
        ])->municipalities()->createMany([
            ['municipality'=>'Abasolo'],
            ['municipality'=>'Acuña'],
            ['municipality'=>'Allende'],
            ['municipality'=>'Arteaga'],
            ['municipality'=>'Candela'],
            ['municipality'=>'Castaños'],
            ['municipality'=>'Cuatro Ciénegas'],
            ['municipality'=>'Escobedo'],
            ['municipality'=>'Francisco I. Madero'],
            ['municipality'=>'Frontera'],
            ['municipality'=>'General Cepeda'],
            ['municipality'=>'Guerrero'],
            ['municipality'=>'Hidalgo'],
            ['municipality'=>'Jiménez'],
            ['municipality'=>'Juárez'],
            ['municipality'=>'Lamadrid'],
            ['municipality'=>'Matamoros'],
            ['municipality'=>'Monclova'],
            ['municipality'=>'Morelos'],
            ['municipality'=>'Múzquiz'],
            ['municipality'=>'Nadadores'],
            ['municipality'=>'Nava'],
            ['municipality'=>'Ocampo'],
            ['municipality'=>'Parras'],
            ['municipality'=>'Piedras Negras'],
            ['municipality'=>'Progreso'],
            ['municipality'=>'Ramos Arizpe'],
            ['municipality'=>'Sabinas'],
            ['municipality'=>'Sacramento'],
            ['municipality'=>'Saltillo'],
            ['municipality'=>'San Buenaventura'],
            ['municipality'=>'San Juan de Sabinas'],
            ['municipality'=>'San Pedro'],
            ['municipality'=>'Sierra Mojada'],
            ['municipality'=>'Torreón'],
            ['municipality'=>'Viesca'],
            ['municipality'=>'Villa Unión'],
            ['municipality'=>'Zaragoza'],
        ]);
        State::create([
            'state' => 'Colima'
        ])->municipalities([
            ['municipality'=>'Armería'],
            ['municipality'=>'Colima'],
            ['municipality'=>'Comala'],
            ['municipality'=>'Coquimatlán'],
            ['municipality'=>'Cuauhtémoc'],
            ['municipality'=>'Ixtlahuacán'],
            ['municipality'=>'Manzanillo'],
            ['municipality'=>'Minatitlan'],
            ['municipality'=>'Tecomán'],
            ['municipality'=>'Villa de Álvarez'],
        ]);
    }
}
