<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'APPLE AirPods Pro 2e generatie 2022'],
            ['name' => 'APPLE Watch SE 2022 40 mm Midnight'],
            ['name' => 'APPLE Watch SE 2022 44 mm Midnight'],
            ['name' => 'APPLE iPhone 14 Pro 128GB Space Black'],
            ['name' => 'APPLE iPhone 14 Pro 256GB Space Black'],
            ['name' => 'APPLE iPhone 14 Pro Max 128GB Space Black'],
            ['name' => 'APPLE iPhone 14 Pro Max 256GB Space Black']
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
