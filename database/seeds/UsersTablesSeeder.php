<?php

use Illuminate\Database\Seeder;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usersテーブルにユーザーを追加する
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'mail' => 'atlassns@gmail',
            'password' => bcrypt('12345678'),  //bcrypt()で暗号化
            'bio' => '',]
            ]);
    }
}
