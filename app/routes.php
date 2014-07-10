<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello', array('categories' => Category::where('status', true)->orderBy('nombre', 'ASC')->get()));
});

Route::get('search', 'SearchController@search');

Route::get('admin', array('before' => 'auth.basic', 'uses' => function()
{
    return View::make('admin', array('categories' => Category::orderBy('nombre', 'ASC')->get()));
}));

Route::get('test', function(){ 
	return Hash::make('amigosdelgesto'); 
});

Route::get('categories/{id}', function($id)
{
    return View::make('category', array('category' => Category::findOrFail($id)));
});

Route::get('gestures/{idGesture}', function($idGesture)
{
    $gesture = Gesture::findOrFail($idGesture);
    $category = Category::findOrFail($gesture->id_categoria);
    $next = Gesture::where('id_categoria', $category->id_categoria)->where('titulo', '>', $gesture->titulo)->orderBy('titulo', 'ASC')->first();
    $previous = Gesture::where('id_categoria', $category->id_categoria)->where('titulo', '<', $gesture->titulo)->orderBy('titulo', 'DESC')->first();

    return View::make('gesture', array(
            'gesture' => $gesture,
            'next' => $next,
            'previous' => $previous,
            'category' => $category,
        )
    );
});

Route::get('categories/{idCategory}/gestures/{idGesture}', function($idCategory, $idGesture)
{
    $gesture = Gesture::findOrFail($idGesture);
    $category = Category::findOrFail($gesture->id_categoria);
    $next = Gesture::where('id_categoria', $category->id_categoria)->where('titulo', '>', $gesture->titulo)->orderBy('titulo', 'ASC')->first();
    $previous = Gesture::where('titulo', '<', $gesture->titulo)->orderBy('titulo', 'DESC')->first();

    return View::make('gesture', array(
            'gesture' => $gesture,
            'next' => $next,
            'previous' => $previous,
            'category' => $category,
        )
    );
});

Route::get('categories/{id}/delete', 'CategoryController@deleteCategory');
Route::get('categories/{id}/delete-entire', 'CategoryController@deleteCategory');
Route::get('gestures/{id}/delete', 'GestureController@deleteGesture');

Route::get('categories/{id}/edit', function($id) {
    return View::make('edit-category')->with(array('category' => Category::findOrFail($id), 'categories' => Category::where('id_categoria', '<>', $id)->where('status', true)->get()));
});
Route::get('gestures/{id}/edit', function($id) {
    return View::make('edit-gesture')->with(array('gesture' => Gesture::findOrFail($id), 'categories' => Category::where('status', true)->get()));
});

Route::post('categories', 'CategoryController@newCategory');
Route::post('gestures', 'GestureController@newGesture');

Route::post('categories/{id}/update', 'CategoryController@editCategory');
Route::post('gestures/{id}/update', 'GestureController@editGesture');