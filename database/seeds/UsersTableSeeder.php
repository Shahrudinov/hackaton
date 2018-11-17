<?php

use App\HasRoles;
use App\Models\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                            /**USER**/
        User::create([
            // 'id' => 1,
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password42'),
            'phone_number' => '0968561994',
            'skype' => 'admin'
        ]);

        User::create([
            // 'id' => 3,
            'first_name' => 'librarian',
            'last_name' => 'librarian',
            'email' => 'librarian@mail.com',
            'password' => bcrypt('password42'),
            'phone_number' => '0631609961',
            'skype' => 'librarian'
        ]);

        User::create([
            // 'id' => 2,
            'first_name' => 'shamil',
            'last_name' => 'shahrudinov',
            'email' => 'shama@i.ua',
            'password' => bcrypt('password42'),
            'phone_number' => '0951443002',
            'skype' => 'shahrudinov'
        ]);


        /**ROLE**/
        Role::create([
            // 'id' => 1,
            'name' => 'admin'
        ]);

        Role::create([
            // 'id' => 2,
            'name' => 'librarian'
        ]);

        Role::create([
            // 'id' => 3,
            'name' => 'reader'
        ]);

                                /** has role  **/
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);

        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);
    }
}
