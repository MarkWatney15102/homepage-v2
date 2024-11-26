<?php

namespace App\lib\API;

class RequestHandler
{
  private static $curl;

  private static $response;

  private static $error;

  private static $errorNo;

  private static $httpStatusCode;

  public function __construct($url, $method)
  {
    self::$curl = curl_init();
    curl_setopt(self::$curl, CURLOPT_URL, $url);
    curl_setopt(self::$curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt(self::$curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(self::$curl, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt(self::$curl, CURLOPT_TIMEOUT, 20);
    curl_setopt(self::$curl, CURLOPT_SSL_VERIFYPEER, false);
  }

  private static function handleErrors()
  {
    self::$error = curl_error(self::$curl);
    self::$errorNo = curl_errno(self::$curl);
    self::$httpStatusCode = curl_getinfo(self::$curl, CURLINFO_HTTP_CODE);

    if (0 !== self::$errorNo) {
      throw new \RuntimeException(self::$error, self::$errorNo);
    }
  }

  public static function post($url, $data, $headers = [])
  {
    new self($url, 'POST');

    // set post fields here before executing
    curl_setopt(self::$curl, CURLOPT_POSTFIELDS, JSON::stringify($data));

    if (count($headers)) {
      curl_setopt(self::$curl, CURLOPT_HTTPHEADER, $headers);
    }

    self::$response = curl_exec(self::$curl);

    self::handleErrors();

    curl_close(self::$curl);

    return self::$response;
  }

  public static function get($url, $headers = [])
  {
    new self($url, 'GET');

    if (count($headers)) {
      curl_setopt(self::$curl, CURLOPT_HTTPHEADER, $headers);
    }

    self::$response = curl_exec(self::$curl);

    self::handleErrors();

    curl_close(self::$curl);

    return self::$response;
  }


  public static function put($url, $data)
  {
    new self($url, 'PUT');

    curl_setopt(self::$curl, CURLOPT_POSTFIELDS, $data);

    self::$response = curl_exec(self::$curl);

    self::handleErrors();

    curl_close(self::$curl);

    return self::$response;
  }
}
