<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 9:23
 */


namespace Core;

class Loader {
    public static function load(string $fqn): void {
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $fqn) . '.php';
        $absolute = Loader::getRoot() . DIRECTORY_SEPARATOR . $fileName;

        if (file_exists($absolute) && is_file($absolute)) {
            require_once($absolute);
        }
    }

    public static function getRoot(): string {
        return realpath(__DIR__ . DIRECTORY_SEPARATOR . '..');
    }
}

spl_autoload_register(array(Loader::class, 'load'));