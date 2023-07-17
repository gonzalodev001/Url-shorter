<?php

namespace App\Url\Application;

use App\Url\Domain\Aggregate\Url;
use App\Url\Domain\Repository\UrlRepository;

class UrlShorternedRegisterUseCase
{
    public function __construct(private UrlRepository $urlRepository)
    {
    }

    public function __invoke(string $id, string $urlLong, string $urlShorterned, int $numberVisited, string $idUser): Url
    {
        $url = Url::registerUrlShorterned($id, $urlLong, $urlShorterned, $numberVisited, $idUser);

        return $this->urlRepository->save($url);
    }
}