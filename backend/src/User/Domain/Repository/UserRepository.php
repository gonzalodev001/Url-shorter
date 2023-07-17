<?php

namespace App\User\Domain\Repository;

use App\User\Domain\Aggregate\User;

interface UserRepository
{
    public function save(User $user): string;
    public function findUser(string $userName): ?User;
}