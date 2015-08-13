<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        /*factory('CodeProject\Entities\User')->create(
            [
                'name' => 'Bruno',
                'email' => 'br2005@oi.com.br',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10)
            ]
        );*/

        // $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        // $this->call(ProjectTableSeeder::class);

        Model::reguard();
    }
}
