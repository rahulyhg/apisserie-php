<?php

use App\Section;
use App\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProductTableSeeder extends Seeder
{

    private $list =
    [
      "Comptoir" =>
      [
        "Jus de carottes",
        "Poulet rôti"
      ],

      "Plats préparés" =>
      [
        "Salade",
        "Soupe",
        "Tourtière"
      ],

      "Fruits" =>
      [
        "Citrons",
        "Fraises",
        "Framboises",
        "Lime",
        "Oranges",
        "Pamplemousse",
        "Pommes",
        "Raisins blancs",
        "Raisins rouges"
      ],

      "Légumes" =>
      [
        "Ail",
        "Avocats",
        "Carottes",
        "Céleri",
        "Chou",
        "Concombres",
        "Laitue",
        "Maïs",
        "Oignons",
        "Oignons vert",
        "Panais",
        "Petates",
        "Petates douces",
        "Petates grelot",
        "Poivrons",
        "Tomates",

        "Sauce césar",
        "Trempette"
      ],

      "Fines Herbes" =>
      [
        "Basilic",
        "Ciboulette",
        "Laurier",
        "Menthe"
      ],

      "Poissonerie" =>
      [
        "Saumon",
        "Saumon fumé",
        "Wicked Tuna"
      ],

      "Fromagerie" =>
      [
        "Fromage de chèvre",
        "Parmesan"
      ],

      "Charcuterie" =>
      [
        "Chorizo",
        "Jambon",
        "Pancetta",
        "Prosciutto"
      ],

      "Pain" =>
      [
        "Bagels",
        "Baguette",
        "Croûtons",
        "Pains à Burgers",
        "Pains à Hot-Dogs",
        "Pain en tranches",
        "Pain Naan",
        "Pain Plats",
        "Pita",
        "Tortilla"
      ],

      "Boucherie" =>
      [
        "Boeuf Haché",
        "Filets de porc",
        "Poitrines de poulet",
        "Steak",

        "Bacon",
        "Saucisses à Hot-Dog"
      ],

      "Rayon 1" =>
      [
        "Essuie-Tout",
        "Mouchoirs",
        "Papier toilette"
      ],

      "Rayon 2" =>
      [
        "Papier Aluminium"
      ],

      "Rayon 3" =>
      [
        "Bouffe pour minous",
        "Lessive",
        "Liquide vaisselle",
        "Litière",
        "Poudre à litière",
        "Resolve"
      ],

      "Rayon 4" =>
      [
        "Jus de tomate",
        "Kit à burritos",
        "Kit à fajitas",
        "Kit à tacos",
        "Lasagnes",
        "Pâte de tomate",
        "Pâtes",
        "Riz",
        "Sauce tomate",
        "Soupe à l'oignon",
        "Ziploc"
      ],

      "Rayon 5" =>
      [
        "Bovril",
        "Chapelure",
        "Ketchup",
        "Maïs en crème",
        "Mayonnaise",
        "Moutarde",
        "Olives noires",
        "Olives vertes",
        "Relish",
        "Sauce BBQ",
        "Sauce Chili",
        "Sauce Teriyaki",
        "Tomates en conserve"
      ],

      "Rayon 6" =>
      [
        "Beurre de pinote",
        "Céréales",
        "Confiture",
        "Lait de Coco",
        "Miel",
        "Nutella",
        "Sucre",
        "Twin"
      ],

      "Rayon 7" =>
      [
        "Chips",
        "Biscuits",
        "Gomme",
        "Grignotines"
      ],

      "Rayon 8" =>
      [
        "Bière",
        "Pepsi",
        "Soda Club"
      ],

      "Rayon 9" =>
      [
        "Ananas en conserve",
        "Beurre",
        "Cheddar",
        "Fromage suisse",
        "Fromage en tranches",
        "Jus",
        "Mozarrella-ish",
        "Yogourt",
        "Yogourt Grec"
      ],

      "Surgelés" =>
      [
        "Crème glacée"
      ],

      "Produits Laitiers" =>
      [
        "Crème à café",
        "Crème à cuisson",
        "Crème fraîche",
        "Crème sûre",
        "Fromage à la crème",
        "Lait"
      ],

      "Pharmacie" =>
      [
        "Dentifrice",
        "Déo",
        "Gaviscon",
        "Gel douche",
        "Q-Tips",
        "Pastilles",
        "Réactine",
        "Serviettes",
        "Shampooing",
        "Sirop toux",
        "Tampons démaquillants",
        "Vibrateur"
      ]
    ];




	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
    {
        DB::table('products')->delete();
        DB::table('sections')->delete();

        foreach ( $this->list as $section => $products )
        {
            $cat = Section::create([ 'name' => $section ]);

            foreach ( $products as $product )
            {
                Product::create(['name' => $product, 'section_id' => $cat->id ]);
            }
        }
    }

}
