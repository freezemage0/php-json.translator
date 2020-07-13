<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 9:31
 */


namespace Core\File;

class Writer {
    private const WRITE_MODE = 'w';

    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function write(string $data): void {
        $handle = fopen($this->filename, Writer::WRITE_MODE);
        fwrite($handle, $data);
        fclose($handle);
    }
}