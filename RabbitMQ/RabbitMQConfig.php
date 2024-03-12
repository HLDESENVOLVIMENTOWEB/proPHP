<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQConfig {
    private $connection;
    private $channel;

    public function __construct($host, $port, $user, $password) {
        $this->connection = new AMQPStreamConnection($host, $port, $user, $password);
        $this->channel = $this->connection->channel();
    }

    public function getChannel() {
        return $this->channel;
    }

    public function close() {
        $this->channel->close();
        $this->connection->close();
    }
}