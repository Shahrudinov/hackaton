<?php

use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Categories */
        \App\Category::insert([
            [
                // 'id' => 1,
                'name' => 'Программирование',
                'parent_id' => null,
            ], [
                // 'id' => 2,
                'name' => 'Художественная литература',
                'parent_id' => null,
            ], [
                // id => 3
                'name' => 'Ужасы',
                'parent_id' => 2
            ], [
                // id => 4
                'name' => 'PHP',
                'parent_id' => 1,
            ], [
                // id => 5
                'name' => 'Javascript',
                'parent_id' => 1
            ]
        ]);
    }
}
