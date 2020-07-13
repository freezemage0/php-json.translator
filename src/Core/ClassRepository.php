<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 14:40
 */


namespace Core;

use Core\Entity\MinifiedClassEntity;

class ClassRepository {
    private static $instance;
    private $repository;
    private $aliases;
    private $minified;

    public static function create(): ClassRepository {
        if (ClassRepository::$instance === null) {
            ClassRepository::$instance = new ClassRepository();
        }

        return ClassRepository::$instance;
    }

    private function __construct() {
        $this->repository = array();
    }

    public function setMinified(string $minified): void {
        $this->minified = json_decode($minified, JSON_UNESCAPED_UNICODE);
    }

    public function instantiate(string $class) {
        $this->createInternalAlias($class);
        $alias = $this->getInternalAlias($class);

        $this->repository[$alias] = $this->declare($class);
        return $this->repository[$alias];
    }

    public function release(string $class): void {
        $alias = $this->getInternalAlias($class);
        unset($this->repository[$alias]);
    }

    private function declare(string $class): StubClass {
        $description = $this->getClassDescription($class);
        $minifiedClass = new MinifiedClassEntity($description);
        return $minifiedClass->build();
    }

    private function getClassDescription(string $class): array {
        foreach ($this->minified as $description) {
            if ($description['name'] === $class) {
                return $description['methods'];
            }
        }

        return array();
    }

    private function getInternalAlias(string $className): string {
        return $this->aliases[$className];
    }

    private function createInternalAlias(string $className): void {
        $this->aliases[$className] = md5(time());
    }
}