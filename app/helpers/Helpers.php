<?php

/*
|------------------------------------------------------------
|   Clase para el manejo de archivos de la aplicación
|------------------------------------------------------------
*/
class FileManager {

    /*
    |----------------------------------------------------------------------------------------
    |                          Función moveFile($file,$destinationPath)
    |----------------------------------------------------------------------------------------
    |  Mueve un archivo hasta un directorio destino
    |
    |  Parametros:
    |  $file = archivo que se desea mover.
    |  $destinationPath = directorio destino del archivo.
    |
    |
    */
    public static function moveFile($file,$destinationPath,$microtime = '') {
        $destinationPath = self::clean($destinationPath);
        $name = FileManager::getName($file);
        $microtime =str_replace('.', '', $microtime);
        FileManager::createDir($destinationPath);
        $value = (is_file($file)) ? $file->move($destinationPath, $microtime.$name): false;
        return ($value) ? $destinationPath.$microtime.$name : false;
    }

    /*
    |----------------------------------------------------------------------------------------
    |                                   Función createDir($path) 
    |----------------------------------------------------------------------------------------
    |  Crea un directorio si este no existe.
    |
    |  Parametros:
    |  $path = ruta del directorio.
    |
    |
    */
    public static function createDir($path) {
        return (!is_dir($path)) ? mkdir($path) : false;
    }

    /*
    |----------------------------------------------------------------------------------------
    |                                   Funcion getName($file) 
    |----------------------------------------------------------------------------------------
    |  Retorna el nombre original del archivo soolo si este de verdad es un archivo.
    |
    |  Parametros:
    |  $path = ruta del directorio.
    |
    |
    */
    public static function getName($file) {
        return (is_file($file)) ? self::clean($file->getClientOriginalName()) : '';
    }

    /*
    |----------------------------------------------------------------------------------------
    |                                 Funcion cleanName($str)
    |----------------------------------------------------------------------------------------
    |  Retorna un string sin caracteres especiales
    |
    |  Parametros:
    |  $str = cadena que va a ser limpiada
    |
    |
    */
    public static function clean($str) {
        $problematicCharacters = array(" ","á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ");
        $cuteCharacters = array("","a","e","i","o","u","n","A","E","I","O","U","N");
        return str_replace($problematicCharacters,$cuteCharacters,$str);
    }

    public static function deleteDir($dirPath) {
        
        if (! is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public static function updateResourcePath($actualPath, $newRootPath) {
        $fileName = substr($actualPath, strripos($actualPath, '/'));
        $newRootPath = self::clean($newRootPath);
        return $newRootPath . $fileName;
    }

    public static function rename($actualName, $newName) {
        return rename(self::clean($actualName), self::clean($newName));
    }

}

/*
|------------------------------------------------------------
|   Clase para el manejo de validaciones de la aplicacion
|------------------------------------------------------------
*/
class ValidationManager {

    /*
    |----------------------------------------------------------------------------------------
    |                               Función isValid($data,$rules) 
    |----------------------------------------------------------------------------------------
    |  Retorna si la data recibida es valida o no de acuerdo a un conjunto de reglas
    |  de validación.
    |
    |  Parametros:
    |  $data = array de datos que se evaluara para saber si son validos o no.
    |  $rules = array de reglas de validación.
    |
    */
    public static function isValid($data,$rules) {
        return !Validator::make($data,$rules)->fails();
    }

    /*
    |----------------------------------------------------------------------------------------
    |                               Función getFails($data,$rules) 
    |----------------------------------------------------------------------------------------
    |  Retorna un arreglo con los datos que fallaron al momento de la validación de
    |  validación, los parametros son los mismos que los de la funcion isValid.
    |
    |
    */
    public static function getFails($data,$rules) {
        $validator = Validator::make($data,$rules);
        $validator->fails();
        return $validator->failed();
    }

}
