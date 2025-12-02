<?php

namespace Center\MiniFramework\Core;

class Response
{
  private int $statusCode = 200;
  private array $headers = [];
    private string $body = '';

  public function setStatusCode(int $statusCode): void
  {
      $this->statusCode = $statusCode;
      http_response_code($statusCode);

  }
  public function setHeader(string $key,string $value): void
  {
      $this->headers[$key] = $value;
      header("$key: $value");
  }
  public function setBody(string $content): void
  {
      $this->body =$content ;
  }
  public function sendMessage(): void
  {
      echo $this->body;
  }

}