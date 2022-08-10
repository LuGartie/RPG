<?php

namespace APP\Model;

class user {
    private int $user_id;
    private string $user_nick;

    public function __construct(
        string $user_nick,
        string $user_password,
        int $user_id = 0
    ) {
        $this->user_id = $user_id;
        $this->user_nick = $user_nick;
        $this->user_password = $user_password;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}