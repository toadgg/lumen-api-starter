<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run()
    {
        app('db')->table('users')->delete();

        $user = app()->make('App\User');
        $hasher = app()->make('hash');

        $user->fill([
            'name' => 'BiBiHub',
            'email' => 'toadgg@bibihub.com',
            'password' => $hasher->make('pa$$w0rd')
        ]);
        $user->save();
    }

}