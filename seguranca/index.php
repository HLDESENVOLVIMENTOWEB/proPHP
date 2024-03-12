<?php

require 'passwordUtils.php';

$result = validateAndFilterPassword('SenhaForte@123');
if ($result['success']) {
    echo "Senha válida: " . $result['password'];
} else {
    echo "Erro: " . implode(" ", $result['errors']);
}
