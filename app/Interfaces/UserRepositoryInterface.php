<?php

namespace App\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function validateCredentials(string $email, string $password): User|null;
}
