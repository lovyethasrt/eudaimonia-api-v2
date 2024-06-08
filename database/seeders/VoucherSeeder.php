<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vouchers = [
            "10% Off Your Next Purchase",
            "Free Shipping on Orders Over $50",
            "Buy One, Get One Free",
            "Limited Time Offer: 20% Off Everything",
            "Get $10 Off When You Refer a Friend",
            "Flash Sale: Up to 50% Off Selected Items",
            "Exclusive Discount for Newsletter Subscribers",
            "Weekend Special: Extra 15% Off Clearance Items",
            "Holiday Sale: Save Big on Gifts for Everyone",
            "Student Discount: 10% Off with Valid ID"
        ];

        foreach($vouchers as $v){
            Voucher::factory()->create([
                'title' => $v
            ]);
        }
          
    }
}
