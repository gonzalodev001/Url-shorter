<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;
use App\User\Application\UserRegisterUseCase;

class UserRegisterPostController extends AbstractController
{
    public function __construct(private UserRegisterUseCase $registerUser)
    {

    }

    #[Route('/users', name: '_user_register', methods: ['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $id = Uuid::v4()->toRfc4122();
        $data = $request->toArray();
    
        $this->registerUser->__invoke(
            $id,
            $data['name'],
            $data['email'],
            $data['password']
        );

        return new JsonResponse('ok', Response::HTTP_OK);
    }
}