<?php

namespace App\Url\Domain\Repository;

use App\Url\Domain\Aggregate\Url;

interface UrlRepository
{
    public function save(Url $url): Url;
    public function all(string $idUser): array;
    public function findByUrlShorterend(string $urlShorterned): array;
    public function countNewVisite(string $id): void;
}