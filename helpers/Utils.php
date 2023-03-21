<?php

class Utils
{
    public static function validateURL()
    {
        $url = explode("/", URL);
        if (empty($url[1]) && empty($url[2])) {
            header(LOCATION_DEFAULT);
        }
    }

    public static function validateSession()
    {
        if (!isset($_SESSION['autenticado'])) {
            header(LOCATION_LOGIN);
        }
    }

    public static function validateAuth()
    {
        if (isset($_SESSION['autenticado'])) {
            header(LOCATION_DEFAULT);
        }
    }

    public static function getMessageJson($status, $message)
    {
        return json_encode([
            'status' => $status,
            'message' => $message
        ]);
    }

    public static function createSession($data)
    {
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    //--------------------------------------------------------------
    // Funciones de javascript para los controladores
    //--------------------------------------------------------------
    public static function jsScript(&$session)
    {
        if (isset($session['script'])) {
            foreach ($session['script'] as $script) {
                echo '<script src="' . $script['url'] . '"></script>' . PHP_EOL;
                if (isset($script['removeAfterLoad']) && $script['removeAfterLoad']) {
                    self::deleteSession($session, 'script');
                }
            }
        }
    }

    public static function setJsScript(&$session, $script, $removeAfterLoad = false)
    {
        $session['script'][] = [
            'url' => $script,
            'removeAfterLoad' => $removeAfterLoad
        ];
    }

    public static function deleteSession(&$session, $key)
    {
        unset($session[$key]);
    }

    public static function clearData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function encrypt($data)
    {
        $key = hash('sha256', SECRET_KEY);
        $ivLen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivLen);
        $cipherTextRaw = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $cipherTextRaw, $key, true);
        return base64_encode($iv . $hmac . $cipherTextRaw);
    }

    public static function decrypt($cipherText)
    {
        $key = hash('sha256', SECRET_KEY);
        $c = base64_decode($cipherText);
        $ivLen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = substr($c, 0, $ivLen);
        $hmac = substr($c, $ivLen, $sha2len = 32);
        $cipherTextRaw = substr($c, $ivLen + $sha2len);
        $originalPlainText = openssl_decrypt($cipherTextRaw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $calcMac = hash_hmac('sha256', $cipherTextRaw, $key, true);
        if (hash_equals($hmac, $calcMac)) {
            return $originalPlainText;
        }
        return null;
    }
}
