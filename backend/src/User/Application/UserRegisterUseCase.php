<?php

namespace App\User\Application;

use App\User\Domain\Repository\UserRepository;
use App\User\Domain\Aggregate\User;

class UserRegisterUseCase
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function __invoke(string $id, string $name, string $email, string $password): string
    {
        $email = $email; //new Email($email);
        $user = User::createUser($id, $name, $email, $password);

        return $this->userRepository->save($user);
    }
}