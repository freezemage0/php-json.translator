<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 9:34
 */


namespace Core\Entity;

use Core\File\Reader;

class MethodEntity {
    private $reflection;

    public function __construct(\ReflectionMethod $reflection) {
        $this->reflection = $reflection;
    }

    public function stringify(): string {
        $filename = $this->reflection->getFileName();
        $reader = new Reader($filename);
        $lines = explode(PHP_EOL, $reader->read());

        $currentLine = $this->reflection->getStartLine();

        $methodBody = array();
        while ($currentLine < ($this->reflection->getEndLine() - 1)) {
            $methodBody[] = trim($lines[$currentLine]);
            $currentLine++;
        }

        return implode('', $methodBody);
    }
}