<?php

class User{

    public function __construct(
        private ?int $id, 
        private string $username, 
        private string $email, 
        private string $password, 
        private string $role, 
        private ?DateTimeImmutable $created_at = null,
    ){}

    public function getId(): ?int 
    {
        return $this->id;
    }

    public function getUsername(): string 
    {
        return $this->username;
    }

    public function setUsername($username): static  
    {
        $this->username = $username;
        return $this;
    }
 
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($nonHashPassword): static
    {
        $this->password = password_hash($nonHashPassword, PASSWORD_DEFAULT);
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole($role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getCreated_at(): ?DateTimeImmutable
    {
        return $this->created_at;
    }
}