<?php

/* DECODES
--------------------------------------------------------------------------*/
Route::controller('decodes/art', 'Decode\ArtController');
Route::controller('decodes/furniture', 'Decode\FurnitureController');
Route::controller('decodes/items', 'Decode\ItemController');
Route::controller('decodes/maps', 'Decode\MapController');
Route::controller('decodes/master', 'Decode\MasterController');
Route::controller('decodes/voice', 'Decode\VoiceController');
Route::controller('decodes', 'Decode\MainController');

/* KC3 API
--------------------------------------------------------------------------*/
Route::get('api/users', 'Api\UsersController@index');
Route::post('api/users', 'Api\UsersController@create');
Route::get('api/users/{id}', 'Api\UsersController@get');
Route::post('api/users/{id}', 'Api\UsersController@update');
Route::delete('api/users/{id}', 'Api\UsersController@deactivate');

/* KC3 SOCIAL SITE
--------------------------------------------------------------------------*/
Route::get('player/{id}', function ($id) {
    return 'User '.$id;
});

/* KC3 DATA
--------------------------------------------------------------------------*/
Route::controller('data/master', 'Data\MasterController');
Route::controller('data/quests', 'Data\QuestsController');

/* MAIN SITE
--------------------------------------------------------------------------*/
Route::controller('/', 'Site\HomeController');
