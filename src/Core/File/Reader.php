<?php
/**
 * Created by PhpStorm.
 * User: demyanseleznev
 * Date: 10.07.20
 * Time: 9:29
 */


namespace Core\File;

class Reader {
    private const READ_MODE = 'r';
    private const READ_LENGTH = 1024;

    private $filename;

    public function __construct(string $filename) {
        $this->filename = $filename;
    }

    public function read(): string {
        $handle = fopen($this->filename, Reader::READ_MODE);

        $data = array();
        while ($part = fread($handle, Reader::READ_LENGTH)) {
            $data[] = $part;
        }

        fclose($handle);
        return implode('', $data);
    }
}