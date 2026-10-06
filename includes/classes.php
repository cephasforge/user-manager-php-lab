<?php

class User{
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $role;
    public string $created_at;

    public function __construct(int $id, string $username, string $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    

}