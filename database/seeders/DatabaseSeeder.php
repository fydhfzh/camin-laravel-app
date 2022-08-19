<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'Alat Tulis Kantor'
        ]);

        Category::create([
            'name' => 'Toner dan Cartridge'
        ]);

        Category::create([
            'name' => 'Perlengkapan Rumah Tangga'
        ]);

        Category::create([
            'name' => 'Aksesoris Komputer'
        ]);
        
        User::factory(5)->create();
        Product::factory(40)->create();
        CartProduct::factory(40)->create();
        Review::factory(200)->create();
        Transaction::factory(20)->create();
        TransactionItem::factory(100)->create();
    }
}
