<?php

namespace Younes\Youdemy\Helpers;

class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }

    public function flash($key, $value = null)
    {
        if($value) {
            $this->set($key, $value);
        } else {
            $value = $this->get($key);
            $this->remove($key);
            return $value;
        }
    }

}