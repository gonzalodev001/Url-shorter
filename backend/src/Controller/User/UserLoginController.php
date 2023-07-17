<?php

namespace App\Controller\User;

use App\User\Domain\Aggregate\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class UserLoginController extends AbstractController
{
    //#[Route('/login_check', name: '_user_login', methods:['POST'])]
    public function __invoke()
    {
        
    }
}