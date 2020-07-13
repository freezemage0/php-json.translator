<?php


namespace Core;


use Core\Entity\ClassEntity;

class DependencyResolver {
    private $entity;

    public function __construct(ClassEntity $entity) {
        $this->entity = $entity;
    }

    public function getDependencies(): array {
        return array();
    }
}