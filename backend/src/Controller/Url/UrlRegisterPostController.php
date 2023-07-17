<?php

namespace App\Controller\Url;

use App\Url\Application\UrlShorternedRegisterUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;

class UrlRegisterPostController extends AbstractController
{ 

    public function __construct(private UrlShorternedRegisterUseCase $urlShorternedRegisterUseCase)
    {
    }

    #[Route('/url/register', name:'_urlShorterned_register', methods:['POST'])]
    public function __invoke(Request $request): JsonResponse
    {
        
        $id = Uuid::uuid4()->toString();
        $data = $request->toArray();
       
        $urlShorten = "http://localhost:8000/api/ur/".$data['urlShorterned'];
        $url = $this->urlShorternedRegisterUseCase->__invoke(
            $id,
            $data['urlLong'],
            $urlShorten,
            0,
            $data['idUser']
        );

        $array = [
            "id" => $url->id(),
            "urlLong" => $url->urlLong(),
            "urlShorterned" => $url->urlShorterned(),
            "numbreVisited" => $url->numberVisited(),
            "idUser" => $url->idUser()
        ];
        
        return new JsonResponse($array, Response::HTTP_OK);
    }
}