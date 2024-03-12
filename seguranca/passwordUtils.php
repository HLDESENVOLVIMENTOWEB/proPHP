<?php


function validateAndFilterPassword($password) {
    $minLength = 8;
    $maxLength = 64;
    $errorMessages = [];

    if (strlen($password) < $minLength || strlen($password) > $maxLength) {
        $errorMessages[] = "A senha deve ter entre $minLength e $maxLength caracteres.";
    }

    if (!preg_match('/[A-Z]/', $password)) {
        $errorMessages[] = "A senha deve conter pelo menos uma letra maiúscula.";
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errorMessages[] = "A senha deve conter pelo menos uma letra minúscula.";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errorMessages[] = "A senha deve conter pelo menos um número.";
    }
    if (!preg_match('/[\W_]/', $password)) {
        $errorMessages[] = "A senha deve conter pelo menos um caractere especial.";
    }

    if (!empty($errorMessages)) {
        return ['success' => false, 'errors' => $errorMessages];
    } else {
        return ['success' => true, 'password' => $password];
    }
}
