<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 10:41
 */


namespace Core;

class Declarator {
    private $map;
    private $source;

    public function __construct(string $source) {
        $this->source = $source;
        $this->map = array();
    }

    public function declareAll(): void {
        foreach ($this->getMap() as $classes) {
            foreach ($classes as $class) {
                $this->declareClass($class);
            }
        }
    }

    public function declareClass(string $className): void {

    }

    public function getMap(): array {
        if ($this->map === null) {
            $this->map = json_decode($this->source, true);
        }
        return $this->map;
    }
}