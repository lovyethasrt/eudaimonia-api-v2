<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = [
            "Freshly Baked Baguettes",
            "Warm and Fluffy Croissants",
            "Decadent Chocolate Chip Cookies",
            "Buttery Scones with Jam",
            "Classic French Macarons",
            "Cinnamon Swirl Buns",
            "Artisanal Loaves of Bread",
            "Delicious Blueberry Muffins",
            "Golden Brown Dinner Rolls",
            "Traditional Apple Pie",
            "Homemade Banana Bread",
            "Flaky Cherry Turnovers",
            "Tempting Red Velvet Cupcakes",
            "Soft and Chewy Pretzels",
            "Irresistible Lemon Bars",
            "Rich and Creamy Cheesecake",
            "Savory Onion Focaccia",
            "Delicate Raspberry Danish",
            "Satisfying Pumpkin Pie",
            "Gooey Sticky Buns",
            "Divine Carrot Cake",
            "Wholesome Multigrain Bagels",
            "Scrumptious Brownies",
            "Sourdough Boules with Crispy Crusts",
            "Refreshing Key Lime Pie",
            "Hearty Whole Wheat Bread",
            "Flavorful Pecan Pie",
            "Miniature Chocolate Eclairs",
            "Soft and Sweet Hawaiian Rolls",
            "Indulgent Tiramisu",
            "Mouthwatering Fruit Tart",
            "Succulent Lemon Poppy Seed Cake",
            "Buttermilk Biscuits",
            "Velvety Chocolate Fudge Cake",
            "Delightful Almond Croissants",
            "Gourmet Quiche Lorraine",
            "Classic Peanut Butter Cookies",
            "Irish Soda Bread",
            "Creamy Coconut Cream Pie",
            "Crunchy Biscotti with Almonds",
            "Homestyle Oatmeal Raisin Cookies",
            "Rustic Olive Bread",
            "Decadent Black Forest Cake",
            "Chewy Gingerbread Cookies",
            "Fresh Strawberry Shortcake",
            "Authentic Challah Bread",
            "Exquisite Opera Cake",
            "Butterflake Rolls",
            "Divine Raspberry Chocolate Tart",
            "Soft and Fluffy Brioche",
            "Delicious Linzer Cookies",
            "Savory Spinach and Feta Turnovers",
            "Italian Ciabatta Loaves",
            "Luscious Lemon Meringue Pie",
            "Heavenly Angel Food Cake",
            "Flavorful Cheddar Biscuits",
            "Wholesome Whole Grain Bread",
            "Rich Chocolate Truffles",
            "Buttery Shortbread Cookies",
            "Savory Garlic Knots",
            "Elegant Strawberry Cheesecake",
            "Authentic French Baguette",
            "Dreamy Coconut Macaroons",
            "Warm Peach Cobbler",
            "Crusty Artisan Bread",
            "Delicate Cannoli with Ricotta Filling",
            "Classic Pecan Pie Bars",
            "French Onion Soup Bread Bowls",
            "Flavorful Cinnamon Rolls",
            "Mouthwatering Apple Crisp",
            "Gourmet Chocolate Hazelnut Cake",
            "Classic Madeleines",
            "Irresistible Caramel Brownies",
            "Rustic Olive and Rosemary Focaccia",
            "Buttery Pineapple Upside-Down Cake",
            "Savory Cheddar and Herb Scones",
            "Exquisite Chocolate Soufflé",
            "Homemade Lemon Pound Cake",
            "Cozy Apple Cinnamon Bread",
            "Creamy Pumpkin Cheesecake",
            "Freshly Baked Pumpernickel Loaf",
            "Divine Cherry Almond Tart",
            "Decadent Chocolate Ganache Cake",
            "Traditional Irish Soda Bread",
            "Gourmet Pecan Caramel Rolls",
            "Savory Sun-Dried Tomato and Basil Bread",
            "Heavenly Vanilla Bean Cupcakes",
            "Warm Gingerbread Loaf",
            "Delicious Raspberry Lemonade Cake",
            "Buttery Pecan Shortbread",
            "Flaky Chocolate Croissants",
            "Wholesome Honey Wheat Rolls"
        ];
        $types =  ProductType::query()->select(['id'])->get();

        foreach($title as $t){
            Product::factory()->create([
                'title' => $t,
                'product_type_id' => $types->random()->id
            ]);
        }
    }
}
