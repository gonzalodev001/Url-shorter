<?php

namespace App\Url\Application;

use App\Url\Domain\Aggregate\Url;
use App\Url\Domain\Repository\UrlRepository;

class UrlCountNewVisiteUseCase
{
    public function __construct(private UrlRepository $urlRepository)
    {
    }

    public function __invoke(string $id): void
    {

        $this->urlRepository->countNewVisite($id);
    }
}