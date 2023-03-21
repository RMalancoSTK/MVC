<?php

class Token
{
    private $base64Url;
    private $claveSecreta;

    public function __construct($claveSecreta)
    {
        $this->base64Url = new Base64Url();
        $this->claveSecreta = $claveSecreta;
    }

    public function generarToken($datos)
    {
        $encabezado = [
            'alg' => 'HS256',
            'typ' => 'JWT'
        ];
        $encabezadoCodificado = $this->base64Url->encode(json_encode($encabezado));
        $datosToken = [
            'datos' => $datos
        ];
        $cuerpoCodificado = $this->base64Url->encode(json_encode($datosToken));
        $firma = hash_hmac('sha256', $encabezadoCodificado . '.' . $cuerpoCodificado, $this->claveSecreta, true);
        $firmaCodificada = $this->base64Url->encode($firma);
        return $encabezadoCodificado . '.' . $cuerpoCodificado . '.' . $firmaCodificada;
    }

    public function verificarToken($token)
    {
        $partes = explode('.', $token);
        if (count($partes) !== 3) {
            return false;
        }

        $encabezadoCodificado = $partes[0];
        $cuerpoCodificado = $partes[1];
        $firmaCodificada = $partes[2];

        $encabezado = json_decode($this->base64Url->decode($encabezadoCodificado), true);
        $cuerpo = json_decode($this->base64Url->decode($cuerpoCodificado), true);

        if (!$encabezado || !$cuerpo) {
            return false;
        }

        $firmaCalculada = hash_hmac('sha256', $encabezadoCodificado . '.' . $cuerpoCodificado, $this->claveSecreta, true);
        $firmaCodificadaCalculada = $this->base64Url->encode($firmaCalculada);
        if ($firmaCodificada !== $firmaCodificadaCalculada) {
            return false;
        }

        return $cuerpo['datos'];
    }
}
