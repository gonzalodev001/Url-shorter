<?php

namespace App\Url\Application;

use App\Url\Domain\Aggregate\Url;
use App\Url\Domain\Repository\UrlRepository;

class UrlByUserGetUseCase
{
    public function __construct(private UrlRepository $urlRepository)
    {
    }

    public function __invoke(string $idUser): array
    {

        return $this->urlRepository->all($idUser);
    }
}




