<?php

namespace Center\MiniFramework\Http\Controllers;

use Center\MiniFramework\Core\Database;
use Center\MiniFramework\Core\Request;
use Center\MiniFramework\Core\Response;
use Center\MiniFramework\Core\View;
use Center\MiniFramework\Models\User;
use Center\MiniFramework\Support\Validator;
use Center\MiniFramework\Support\ErrorHandler;

class UserController
{
    public function index(Request $request, Response $response)
    {
        try {
            $users = User::all();
            $html = View::render('User/index', ['users' => $users]);
            $response->setBody($html);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function show($id, Request $request, Response $response)
    {
        try {
            $user = User::find((int)$id);
            if (!$user) {
                return ErrorHandler::handle404($response);
            }
            $html = View::render('User/show', ['user' => $user]);
            $response->setBody($html);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function createForm(Request $request, Response $response)
    {
        try {
            $html = View::render('User/create');
            $response->setBody($html);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function store(Request $request, Response $response)
    {
        try {
            $data = $request->body();

            $errors = Validator::required($data, ['name', 'email']);
            if (!empty($errors)) {
                $response->setBody(
                    View::render('User/create', [
                        'errors' => $errors,
                        'old' => $data
                    ])
                );
                return $response->sendMessage();
            }

            $id = User::create([
                'name' => $data['name'],
                'email' => $data['email']
            ]);

            $response->setStatusCode(302);
            $response->setHeader('Location', '/users/' . $id);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function edit($id, Request $request, Response $response)
    {
        try {
            $user = Database::queryOne("SELECT * FROM users WHERE id = ?", [$id]);
            if (!$user) {
                return ErrorHandler::handle404($response);
            }

            $html = View::render('User/edit', ['user' => $user]);
            $response->setBody($html);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function update($id, Request $request, Response $response)
    {
        try {
            $data = $request->body();
            $name = $data['name'] ?? '';
            $email = $data['email'] ?? '';

          User::update($id,$data);

            $response->setStatusCode(302);
            $response->setHeader('Location', '/users/' . $id);
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }

    public function delete($id, Request $request, Response $response)
    {
        try {
            User::delete($id);
            $response->setStatusCode(302);
            $response->setHeader('Location', '/users');
            return $response->sendMessage();
        } catch (\Throwable $e) {
            return ErrorHandler::handleException($e, $response);
        }
    }
}
