<?php

require_once 'Receiver.php';
require_once 'AddCommand.php';
require_once 'Invoker.php';

$receiver = new Receiver();
$invoker = new Invoker();

$command = new AddCommand($receiver, 10);
$invoker->submit($command);

$invoker->undo();

$invoker->redo();
