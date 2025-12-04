<?php
namespace Center\MiniFramework\Core;

class Application
{
  public function __construct()
  {
      $this->request = new Request();
      $this->response = new Response();
      $this->router = new Router();
  }
  public function router(): Router
  {
      return $this->router;
  }
  public function run(): void
  {
      $this->router->resolve($this->request, $this->response);
  }
}
