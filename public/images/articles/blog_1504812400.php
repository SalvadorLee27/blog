Route::get('images', [
	'uses' => 'ImagesController@index',
	'as' =>	'admin.images.index'

]);

//Crear controlador php artisan make:controller ImagesController