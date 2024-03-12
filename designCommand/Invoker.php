<?php
require_once 'Command.php';

class Invoker {
    private $history = [];
    private $redoStack = [];

    public function submit(Command $command) {
        $command->execute();
        array_push($this->history, $command);
        $this->redoStack = []; 
    }

    public function undo() {
        if (count($this->history)) {
            $command = array_pop($this->history);
            $command->undo();
            array_push($this->redoStack, $command);
        }
    }

    public function redo() {
        if (count($this->redoStack)) {
            $command = array_pop($this->redoStack);
            $command->redo();
            array_push($this->history, $command);
        }
    }
}
