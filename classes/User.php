<?php

class User{

    public function __construct(
        private ?int $id, 
        private string $username, 
        private string $email, 
        private string $password,
        private ?string $role,
        private ?string $createdAt = null,
    ){}

    public function getId(): ?int 
    {
        return $this->id;
    }

    public function setId(int $id): static  
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string 
    {
        return $this->username;
    }

    public function setUsername(string $username): static  
    {
        $this->username = $username;
        return $this;
    }
 
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $nonHashPassword): static
    {
        $this->password = password_hash($nonHashPassword, PASSWORD_DEFAULT);
        return $this;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}