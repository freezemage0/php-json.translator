<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 14:43
 */


namespace Core\Entity;

use Core\StubClass;

class MinifiedClassEntity {
    private $methods;

    public function __construct(array $description) {
        $this->methods = $description;
    }

    public function build(): StubClass {
        $object = new StubClass();
        foreach ($this->methods as $name => $description) {
            $method = new MinifiedMethodEntity($description['body'], $description['arguments']);
            $object->addMethod($name, $method->build());
        }
        return $object;
    }
}