<?php
class Receiver {
    private $total = 0;

    public function addAction($value) {
        $this->total += $value;
        echo "Total agora é: {$this->total}\n";
    }

    public function subtractAction($value) {
        $this->total -= $value;
        echo "Total agora é: {$this->total}\n";
    }
}
