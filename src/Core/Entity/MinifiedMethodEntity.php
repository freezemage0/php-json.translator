<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 14:45
 */


namespace Core\Entity;

class MinifiedMethodEntity {
    private $method;
    private $arguments;

    public function __construct(string $method, array $arguments) {
        $this->method = $method;
        $this->arguments = implode(', ', $arguments);
    }

    public function build(): string {
        return sprintf("function (%s) {
            %s
        }", $this->arguments, $this->method);
    }
}