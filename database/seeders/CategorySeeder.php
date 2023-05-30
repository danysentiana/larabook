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
        $slug = [
            'action-and-adventure',
            'classics',
            'comic-book-or-graphic-novel',
            'detective-and-mystery',
            'fantasy',
            'historical-fiction',
            'horror',
            'literary-fiction',
            'romance',
            'science-fiction',
            'short-stories',
            'suspense-and-thrillers',
            'biographies-and-autobiographies',
            'cookbooks',
            'essays',
            'history',
            'memoir',
            'poetry',
            'self-help',
            'true-crime',
        ];
        for ($i = 0; $i < count($categories); $i++) {
            Category::create([
                'name' => $categories[$i],
                'slug' => $slug[$i],
            ]);
        }
    }
}
