<?php

use Illuminate\Database\Seeder;

class OAuthSeeder extends Seeder {

    public function run()
    {
        $config = app()->make('config');

        app('db')->table("oauth_clients")->delete();

        app('db')->table("oauth_clients")->insert([
            'id' => $config->get('app.client_id'),
            'secret' => $config->get('app.client_secret'),
            'name' => 'Lumen Api Starter'
        ]);
    }

}
