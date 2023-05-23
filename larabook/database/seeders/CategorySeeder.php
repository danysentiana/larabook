<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // book categories
        $categories = [
            'Action and Adventure',
            'Classics',
            'Comic Book or Graphic Novel',
            'Detective and Mystery',
            'Fantasy',
            'Historical Fiction',
            'Horror',
            'Literary Fiction',
            'Romance',
            'Science Fiction (Sci-Fi)',
            'Short Stories',
            'Suspense and Thrillers',
            'Biographies and Autobiographies',
            'Cookbooks',
            'Essays',
            'History',
            'Memoir',
            'Poetry',
            'Self-Help',
            'True Crime',
        ];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
