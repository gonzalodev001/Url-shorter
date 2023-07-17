<?php

namespace App\Url\Application;

use App\Url\Domain\Aggregate\Url;
use App\Url\Domain\Repository\UrlRepository;

class UrlLongRedirectUseCase
{
    public function __construct(private UrlRepository $urlRepository)
    {
    }

    public function __invoke(string $urlShorterned, string $idUser): array
    {

        return $this->urlRepository->findByUrlShorterend($urlShorterned);
    }
}