<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->post('oauth/access_token', function() {
    return response()->json(app('oauth2-server.authorizer')->issueAccessToken());
});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->get('users/~me', function(){
        $user = app('Dingo\Api\Auth\Auth')->user();
        return $user;
    });
});

$api->version('v1', [], function ($api) {
    $api->get('stats', function(){
        return [
            'stats' => 'dingoapi is ok'
        ];
    });
});


