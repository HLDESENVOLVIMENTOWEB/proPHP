<?php
require_once 'RabbitMQConfig.php';
require_once 'MessagePublisher.php';

$rabbitMQConfig = new RabbitMQConfig('localhost', 5672, 'usuario', 'senha');
$channel = $rabbitMQConfig->getChannel();

$messagePublisher = new MessagePublisher($channel);
$messagePublisher->publishMessage('nome_da_fila', 'Sua mensagem aqui');

$rabbitMQConfig->close();