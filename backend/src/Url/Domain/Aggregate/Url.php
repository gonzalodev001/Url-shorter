<?php

namespace App\Url\Domain\Aggregate;

class Url
{
    private string $id;
    private string $urlLong;
    private string $urlShorterned;
    private int $numberVisited;
    private string $idUser;

    private function __construct(
        string $id,
        string $urlLong,
        string $urlShorterned,
        int $numberVisited,
        string $idUser
    )
    {
        $this->id = $id;
        $this->urlLong = $urlLong;
        $this->urlShorterned = $urlShorterned;
        $this->numberVisited = $numberVisited;
        $this->idUser = $idUser;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function urlLong(): string
    {
        return $this->urlLong;
    }

    public function urlShorterned(): string
    {
        return $this->urlShorterned;
    }

    public function numberVisited(): int
    {
        return $this->numberVisited;
    }

    public function idUser(): string
    {
        return $this->idUser;
    }

    public static function registerUrlShorterned(
        string $id,
        string $urlLong,
        string $urlShorterned,
        int $numberVisited,
        string $idUser
        ): self
    {
        return new self($id, $urlLong, $urlShorterned, $numberVisited, $idUser);
    }

    public function countNumberVisited(): void
    {
        $this->numberVisited++;
    }

    public function toArray()
    {
        return [
            "id" => $this->id(),
            "urlLong" => $this->urlLong(),
            "urlShorterned" => $this->urlShorterned(),
            "numberVisited" => $this->numberVisited(),
            "idUser" => $this->idUser()
        ];
    }
}