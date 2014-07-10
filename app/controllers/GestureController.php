<?php
define("GESTURE_PATH","../resources/gestures/");
define("EXAMPLE_PATH","../resources/examples/");
define("IMAGEN_DEFECTO","../resources/prueba.jpg");

define('NEW_GESTURE_RULES',serialize(
    array(
        'titulo' => 'required|unique:gesto,titulo',
        'categoria' => 'required',
        'definicion' => 'required',
        'video' => '',
        'main_image' => ''
    )
)
);
define('EDIT_GESTURE_RULES',serialize(
    array(
        'titulo' => 'required',
        'categoria' => 'required',
        'definicion' => 'required',
    )
)
);
/*
|------------------------------------------------------------
|               Controlador para los gestos
|------------------------------------------------------------
*/
class GestureController extends BaseController {

    /*
    |------------------------------------------------------------
    |           Función que permite agregar un gesto
    |------------------------------------------------------------
    */
    public function newGesture() {
        if (ValidationManager::isValid(Input::all(),unserialize(NEW_GESTURE_RULES))) {
            $gesture = new Gesture();
            $gesture->titulo = Input::get('titulo');
            $gesture->id_categoria = Input::get('categoria');
            $gesture->definicion = Input::get('definicion');
			if($_FILES['main_image']['name'] != null && $_FILES['main_image']['size'] > 0){
				$gesture->url_imagen = FileManager::moveFile(Input::file('main_image'),GESTURE_PATH.$gesture->titulo."/");
            }
			else {
				mkdir(GESTURE_PATH.$gesture->titulo.'/', 0777);
				copy(IMAGEN_DEFECTO,GESTURE_PATH.$gesture->titulo.'/prueba.jpg');
				$gesture->url_imagen = GESTURE_PATH.$gesture->titulo.'/prueba.jpg';
			}
			$gesture->url_video =  FileManager::moveFile(Input::file('video'),GESTURE_PATH.$gesture->titulo."/");
            if ($gesture->save()) {
                $this->newExamples($gesture, Input::get("ej_titulos"),Input::file("ej_imagenes"));
            }
        }
        return Redirect::to('admin');
    }

    /*
    |------------------------------------------------------------
    |      Función que permite agregar ejemplos de un gesto :)
    |------------------------------------------------------------
    */
    public function newExamples($gesture,$ej_titles,$ej_images) {
        $gesture->titulo = str_replace(' ','',$gesture->titulo);
        for ($i=0; $i<sizeof($ej_titles); $i++) {
            if (empty($ej_titles[$i]) || empty($ej_images[$i])) {
                continue;
            }
            $microtime = microtime(TRUE);
            $gesture->examples()->save(
                new Example(array(
                    'titulo' => $ej_titles[$i],
                    'url_imagen' => FileManager::moveFile($ej_images[$i],GESTURE_PATH.$gesture->titulo."/examples/",$microtime)
                )));
        }
    }

    /*
    |------------------------------------------------------------
    |      Función que permite editar un gesto :)
    |------------------------------------------------------------
    */

    public function editGesture($idGesture) {
        if (ValidationManager::isValid(Input::all(),unserialize(EDIT_GESTURE_RULES))) {
            $gesture = Gesture::findOrFail($idGesture);

            $oldFolderName = $gesture->titulo;

            //Se verifica si existe otro gesto con el título nuevo
            $titleExists = Gesture::where('titulo', Input::get('titulo'))
                ->where('id_gesto', '<>', $idGesture)
                ->count();

            //Si el título nuevo está disponible se adopta, y se renombra la carpeta del gesto
            if (!$titleExists) {
                $gesture->titulo = Input::get('titulo');
                FileManager::rename(GESTURE_PATH.$oldFolderName, GESTURE_PATH.$gesture->titulo);
            }

            $gesture->definicion = Input::get('definicion');
            $gesture->id_categoria = Input::get('categoria');

            $image = Input::file('main_image');
            if (!empty($image)) {
                File::delete($gesture->url_imagen);
                $gesture->url_imagen = FileManager::moveFile($image,GESTURE_PATH.$gesture->titulo."/");
            }
            else {
                if (!$titleExists)
                    $gesture->url_imagen = FileManager::updateResourcePath($gesture->url_imagen, GESTURE_PATH.$gesture->titulo);
            }

            $video = Input::file('video');
            if (!empty($video)) {
                File::delete($gesture->url_video);
                $gesture->url_video = FileManager::moveFile($video,GESTURE_PATH.$gesture->titulo."/");
            }
            else {
                if (!$titleExists)
                    $gesture->url_video = FileManager::updateResourcePath($gesture->url_video, GESTURE_PATH.$gesture->titulo);
            }

            if ($gesture->save()) {
                $ej_ejemplos = Input::get('ej_ejemplos');
                $ej_imagenes = Input::file('ej_imagenes');

                for ($i=0; $i<sizeof($ej_ejemplos); $i++) {
                    $example = $gesture->examples()->findOrFail($ej_ejemplos[$i]['id']);
                    if (!empty($ej_ejemplos[$i]['eliminar']) && $ej_ejemplos[$i]['eliminar'] == 'on') {
                        File::delete($example->url_imagen);
                        $example->delete();
                    }
                    else {
                        $example->titulo = $ej_ejemplos[$i]['titulo'];
                        if (empty($ej_imagenes[$i])) {
                            if (!$titleExists)
                                $example->url_imagen = FileManager::updateResourcePath($example->url_imagen, GESTURE_PATH.$gesture->titulo."/examples");
                            //echo 'No se cambia imagen de ' . $ej_ejemplos[$i]['id'] . '. ';
                        }
                        else {
                            $microtime = microtime(TRUE);
                            File::delete($example->url_imagen);
                            $example->url_imagen = FileManager::moveFile($ej_imagenes[$i],GESTURE_PATH.$gesture->titulo."/examples/",$microtime);
                            //echo 'Se cambia imagen de ' . $ej_ejemplos[$i]['id'] . '. ';
                        }
                        $example->save();
                    }
                }

                $this->newExamples($gesture, Input::get("ej_titulos"),Input::file("ej_imagenes_n"));
            }
        }
        return Redirect::to('admin');
    }

    /*
    |------------------------------------------------------------
    |      Función que permite eliminar un gesto x.x
    |------------------------------------------------------------
    */
    public function deleteGesture($idGesture){
        $gesture = Gesture::find($idGesture);
        FileManager::deleteDir(GESTURE_PATH.FileManager::clean($gesture->titulo));
        $gesture->delete();
        return Redirect::to('admin');
    }



}