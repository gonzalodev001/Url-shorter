<?php


namespace App\User\Infrastructure\Persistence\Doctrine;


use Doctrine\ORM\EntityManagerInterface;
use App\User\Domain\Aggregate\User;
use App\User\Domain\Repository\UserRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class DoctrineUserRepository implements UserRepository
{
    public function __construct(private EntityManagerInterface $entityManager, private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function save(User $user): string
    {
        
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $user->getPassword()
        );
        $user->setHashedPassword($hashedPassword);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user->getId();
    }

    public function findUser(string $userName): ?User
    {
        return null;
    }
}