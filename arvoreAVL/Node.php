<?php
class Node {
    public $value;
    public $left = null;
    public $right = null;
    public $height = 1; 

    public function __construct($value) {
        $this->value = $value;
    }
}
