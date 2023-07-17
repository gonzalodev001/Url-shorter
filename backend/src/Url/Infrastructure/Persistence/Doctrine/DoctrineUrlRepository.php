<?php


namespace App\Url\Infrastructure\Persistence\Doctrine;

use App\Url\Domain\Repository\UrlRepository;
use App\Url\Domain\Aggregate\Url;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineUrlRepository implements UrlRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Url $url): Url
    {
        $this->entityManager->persist($url);
        $this->entityManager->flush();
        return $url;
    }

    public function all(string $idUser): array
    {
        $repository = $this->entityManager->getRepository(Url::class);
        $data = $repository->findBy(["idUser" => $idUser]);
      
        return array_map(function ($data) {
            return $data->toArray();
        } ,$data);
    }

    public function findByUrlShorterend(string $urlShorterned): array
    {
        $repository = $this->entityManager->getRepository(Url::class);
        
        $result = $repository->createQueryBuilder('u')
                    ->where('u.urlShorterned LIKE :inUrl')
                    ->setParameter('inUrl','%'.$urlShorterned.'%')
                    ->getQuery()
                    ->getResult();
        
        if($result == null) {
            return "empty";
        }

        $urlResult = $result[0]->toArray();
        
        return $urlResult;
    }

    public function countNewVisite(string $id): void
    {
        $repository = $this->entityManager->getRepository(Url::class);
        $url = $repository->findOneBy(["id" =>$id]);
        
        $url->countNumberVisited();

        $this->entityManager->persist($url);
        $this->entityManager->flush();
    }
}