<?php
/*
|------------------------------------------------------------
|              Controlador para la búsqueda de
|                   categorías y gestos
|------------------------------------------------------------
*/
class SearchController extends BaseController {

    public function search(){
        $keywords = Input::get('q');
        $categories = Category::where('nombre', 'LIKE', '%'. $keywords .'%')->get();
        $gestures = Gesture::where('titulo', 'LIKE', '%'. $keywords .'%')->get();
        return View::make('search', array('keywords' => $keywords, 'categories' => $categories, 'gestures' => $gestures));
    }

}