<?php
require_once 'RabbitMQConfig.php';
use PhpAmqpLib\Message\AMQPMessage;

class MessagePublisher {
    private $channel;

    public function __construct($channel) {
        $this->channel = $channel;
    }

    public function publishMessage($queueName, $messageData) {
        $this->channel->queue_declare($queueName, false, true, false, false);
        
        $mensagemId = uniqid();
        $dados = $messageData . ' ' . $mensagemId;
        $msg = new AMQPMessage($dados, ['delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT]);

        $this->channel->confirm_select();
        $this->channel->basic_publish($msg, '', $queueName);

        $this->channel->set_ack_handler(function (AMQPMessage $message) {
            echo "Mensagem confirmada (ack) com ID " . $message->getBody() . PHP_EOL;
        });

        $this->channel->set_nack_handler(function (AMQPMessage $message) {
            echo "Mensagem NÃO confirmada (nack) com ID " . $message->getBody() . PHP_EOL;
        });

        $this->channel->wait_for_pending_acks();
    }
}
