<?php

class Validation
{
    public static function emailExists($email)
    {
        $data = file_get_contents(DATA_LOCATION);
        $users = json_decode($data, true);
        foreach ($users as $user) {
            if (isset($user['person']['email']) && $user['person']['email'] === $email) {
                return true;
            }
        }
        return false;
    }

    public static function verifyPasswordMatch($senha, $confirmacaoSenha)
    {
        if ($senha === $confirmacaoSenha) {
            return true;
        } else {
            return false;
        }
    }

    public static function isPasswordLengthValid($password)
    {
        return strlen($password) >= 10;
    }
}