<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 9:38
 */


namespace Core\Entity;

class ClassEntity {
    private $reflection;

    public function __construct(\ReflectionClass $reflection) {
        $this->reflection = $reflection;
    }

    public function stringify(): string {
        $data = array(
            'class' => $this->reflection->getName(),
            'methods' => array()
        );

        foreach ($this->reflection->getMethods() as $method) {
            $methodEntity = new MethodEntity($method);
            $data['methods'][$method->getName()] = $methodEntity->stringify();
        }

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}