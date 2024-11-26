<?php

namespace App\lib\API;

use App\lib\Singleton;

class GitHub extends Singleton
{
  private const BASE_URL = "https://api.github.com";

  private string $accessToken = "";

  public static function getInstance(): GitHub
  {
    $instance = parent::getInstance();

    $instance->accessToken = env("GITHUB_ACCESS_TOKEN");

    return $instance;
  }

  public function fetchAllRepos(): array
  {
    $data = $this->get("/user/repos");

    return [];
  }

  private function get(string $uri): array
  {
    $responseArray = [];

    $headers = [
      'Content-Type: application/json',
      'User-Agent: Homepage-Access-Token',
      "Authorization: Bearer {$this->accessToken}"
    ];

    $response = RequestHandler::get(self::BASE_URL . $uri, $headers);

    if (!empty($response)) {
      $responseArray = json_decode($response, true);
    }

    return $responseArray;
  }
}
