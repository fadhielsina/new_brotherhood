<?php

namespace Database\Seeders;

use App\Models\MasterChapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MasterChapter::create([
            'name_chapter' => 'Pusat',
            'location' => 'Indonesia',
            'logo_chapter' => 'logo.jpg'
        ]);
    }
}
