<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 15:36
 */


namespace Core;

class StubClass {
    private $methods;

    public function __call(string $name, array $arguments) {
        if (isset($this->methods[$name])) {
            return $this->methods[$name](...$arguments);
        }

        throw new \BadMethodCallException('Wtf?!');
    }

    public function addMethod(string $name, string $method) {
        $source = sprintf(
            '$this->methods["%s"] = %s;',
            $name,
            $method
        );
        eval($source);
    }
}