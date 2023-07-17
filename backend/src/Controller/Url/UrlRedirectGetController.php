<?php

namespace App\Controller\Url;

use App\Url\Application\UrlLongRedirectUseCase;
use App\Url\Application\UrlCountNewVisiteUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UrlRedirectGetController extends AbstractController
{ 

    public function __construct(
        private UrlLongRedirectUseCase $urlLongRedirectUseCase, 
        private UrlCountNewVisiteUseCase $urCountNewVisite
    )
    {
    }

    #[Route('/{anyurl}', name:'_url_redirect', methods:['GET'])]
    public function __invoke(string $anyurl): RedirectResponse
    {
        $uri = $_SERVER['REQUEST_URI'];
        
        if($uri == "ur") {
            dd("error 404");
        }

        if($anyurl == "ur") {
            dd("error 404", "anyurl");
        }

        $urlOriginal = $this->urlLongRedirectUseCase->__invoke(
            $anyurl,
            'idUser'
        );
        
        if($urlOriginal == "empty") {
            dd("La url acortada proporcionada no existe!");
        }

        $this->urCountNewVisite->__invoke($urlOriginal['id']);

        return $this->redirect($urlOriginal['urlLong']);
    }
}