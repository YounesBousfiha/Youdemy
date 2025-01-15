<?php

namespace Younes\Youdemy\Helpers;

class CSRF
{
    private $session;
    private $token;

    public function __construct(Session $session)
    {
        $this->session = $session;
        $this->generateToken();
    }

    public function generateToken()
    {
        $this->token = bin2hex(random_bytes(32));
        $this->session->set('csrf_token', $this->token);
    }

    public function validate($token)
    {
        return hash_equals($this->session->get('csrf_token'), $token);
    }
}