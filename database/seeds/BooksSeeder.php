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
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                // 'id' => 2,
                'name' => 'Художественная литература',
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                // id => 3
                'name' => 'Ужасы',
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                // id => 4
                'name' => 'PHP',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                // id => 5
                'name' => 'Javascript',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        /* Authors */
        \App\Author::insert([
            [
                // id => 1
                'name' => 'Стивен Кинг',
                'link' => 'https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%B3,_%D0%A1%D1%82%D0%B8%D0%B2%D0%B5%D0%BD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // id => 2
                'name' => 'Жоский ПХП разраб',
                'link' => 'https://ru.wikipedia.org/wiki/%D0%AF',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        /* Books */
        \App\Book::insert([
            [
                // id => 1,
                'title' => 'Жоская книга про PHP',
                'year' => '2018-01-01',
                'image' => 'https://s3-eu-west-1.amazonaws.com/simania-public-assets/bookimages/covers85/857413.jpg',
                'count' => 132,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // id => 2
                'title' => 'Спящие красавицы',
                'year' => '2018-01-01',
                'image' => 'https://www.bookclub.ua/images/db/goods/k/48766_80774_k.jpg',
                'count' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => 0,
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => random_int(1, 52),
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => random_int(1, 52),
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => random_int(1, 52),
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => random_int(1, 52),
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
            [
                'title' => 'Test Book',
                'year' => '1653-01-01',
                'image' => 'https://hachette.azureedge.net/books/thumbnails/9781473666948.jpg?v=17&scale=both&width=440',
                'count' => random_int(1, 52),
                'created_at' => now()->subDays(random_int(1, 1000)),
                'updated_at' => now(),
            ],
        ]);

        /* Authors */
        DB::table('book_authors')->insert([
            ['book_id' => 1, 'author_id' => 2, 'created_at' => now(), 'updated_at' => now()], // id 1
            ['book_id' => 1, 'author_id' => 1, 'created_at' => now(), 'updated_at' => now()], // id 2
            ['book_id' => 2, 'author_id' => 1, 'created_at' => now(), 'updated_at' => now()], // id 3
        ]);

        /* Categories */
        DB::table('book_categories')->insert([
            // Программирование и книга пхп
            ['book_id' => 2, 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 2, 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 2, 'category_id' => 5, 'created_at' => now(), 'updated_at' => now()],

            // Стивен кинг
            ['book_id' => 1, 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['book_id' => 1, 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
