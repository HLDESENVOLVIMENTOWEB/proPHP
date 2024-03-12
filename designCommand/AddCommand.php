<?php

require_once 'Command.php';
require_once 'Receiver.php';

class AddCommand implements Command {
    private $receiver;
    private $value;

    public function __construct(Receiver $receiver, $value) {
        $this->receiver = $receiver;
        $this->value = $value;
    }

    public function execute() {
        $this->receiver->addAction($this->value);
    }

    public function undo() {
        $this->receiver->subtractAction($this->value);
    }

    public function redo() {
        $this->execute();
    }
}
