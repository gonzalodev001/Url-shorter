<?php

namespace App\Controller\Url;

use App\Url\Application\UrlByUserGetUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class UrlByUserGetController extends AbstractController
{ 

    public function __construct(private UrlByUserGetUseCase $urlByUserGetUseCase)
    {
    }

    #[Route('/user/urls', name:'_user_urls', methods:['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        $data = $request->toArray();

        $urls = $this->urlByUserGetUseCase->__invoke(
            $data['idUser']
        );

        return new JsonResponse($urls, Response::HTTP_OK);
    }
}