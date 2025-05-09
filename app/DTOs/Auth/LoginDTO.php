<?php

namespace App\DTOs\Auth;

class LoginDTO
{
    public string $email;
    public string $password;
    
    public function __construct(
        string $email,
        string $password
    ) {
        $this->email = $email;
        $this->password = $password;
    }

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['email'],
            $data['password']
        );
    }
    
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
}