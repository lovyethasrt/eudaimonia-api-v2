<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            "Breads",
            "Pastries",
            "Cakes",
            "Cupcakes",
            "Cookies",
            "Doughnuts",
            "Bagels",
            "Pies",
            "Muffins",
            "Croissants",
            "Scones",
            "Tarts",
            "Brownies",
            "Rolls",
            "Cheesecakes",
            "Eclairs",
            "Biscuits",
            "Danishes",
            "Turnovers",
            "Macarons",
            "Cannoli",
            "Bundt Cakes",
            "Mille-feuille",
            "Pretzels",
            "Brioche",
            "Quiches",
            "Meringues",
            "Truffles",
            "Shortbread",
            "Madeleines",
            "Focaccia",
            "Soufflés",
            "Gingerbread",
            "Pound Cakes",
            "Angel Food Cakes",
            "Caramel Rolls",
            "Cinnamon Rolls",
            "Cupcake Bars",
            "Palmiers",
            "Strudels",
            "Puddings",
            "Macaroons",
            "Churros",
            "Coffee Cakes",
            "Baklava",
            "Blondies",
            "Eclairs",
            "Cannoli",
            "Napoleons",
            "Tiramisu",
            "Babka",
            "Stollen",
            "Panettone",
            "Pandoro",
            "Zucchini Bread",
            "Carrot Cake",
            "Lemon Bars",
            "Fruitcake",
            "Pavlova",
            "Linzer Torte",
            "Crème Brûlée",
            "Éclair Cake",
            "Coffee Cake",
            "Lamingtons",
            "Marshmallow Treats",
            "Pralines",
            "Rugelach",
            "Angel Slices",
            "Bakewell Tart",
            "Battenberg Cake",
            "Charlotte Russe",
            "Chiffon Cake",
            "Dacquoise",
            "Fondant Fancies",
            "Kouign-Amann",
            "Opera Cake",
            "Petit Fours",
            "Sfogliatelle",
            "Victoria Sponge",
            "Yule Log",
            "Zuppa Inglese",
            "Banana Bread",
            "Galette",
            "Gateau Basque",
            "Kladdkaka",
            "Mochi",
            "Mooncake",
            "Pão de Queijo",
            "Sufganiyah",
            "Tarta de Santiago",
            "Tarte Tatin"
        ];

        foreach($titles as $t){
            ProductType::factory()->create([
                'title' => $t
            ]);
        }
          
    }
}
