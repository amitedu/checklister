<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'welcome', 'content' => 'welcome']);
        Page::create(['title' => 'consultation', 'content' => 'consultation']);
    }
}
