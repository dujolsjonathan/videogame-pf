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

//route de la page d'accueil
//affiche la liste des videogames
$router->get('/', [
    'uses' => 'MainController@home',
    'as' => 'home'
]);

//affiche le formulaire d'ajout de videogame en GET
$router->get('/admin', [
    'uses' => 'MainController@admin',
    'as' => 'admin'
]);

//traite le formulaire d'ajout de videogame en POST
$router->post('/admin', [
    'uses' => 'MainController@handleAddVideogame',
    //sans doute inutile d'avoir un nom ici
    'as' => 'adminPost'
]);

//affichage de la page de création de compte
$router->get('/signup', [
    'uses' => 'UserController@signup',
    'as' => 'signup'
]);

//traitement du formulaire du création de compte
$router->post('/signup', [
    'uses' => 'UserController@signupPost',
    'as' => 'signupPost'
]);

//affichage de la page de connexion
$router->get('/signin', [
    'uses' => 'UserController@signin',
    'as' => 'signin'
]);

//traitement du formulaire du connexion
$router->post('/signin', [
    'uses' => 'UserController@signinPost',
    'as' => 'signinPost'
]);

//page de déconnexion
$router->get('/signout', [
    'uses' => 'UserController@signout',
    'as' => 'signout'
]);


//route pour tester et bidouiller
$router->get('/toto-route/{id:[0-9]+}', [
    'as' => 'toto-page',
    'uses' => 'MainController@toto',
]);

//route pour la page contact
$router->get('/contact', [
    'as' => 'contact',
    'uses' => 'MainController@contact',
]);