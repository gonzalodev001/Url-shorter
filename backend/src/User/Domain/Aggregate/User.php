<?php

namespace App\User\Domain\Aggregate;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private string $id;
    private string $name;
    private string $email;
    private string $password;
    private array $roles;

    private function __construct(string $id, string $name, string $email, string $password) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->roles[] = 'ROLE_USER';
    }

    /**
     * @param string $hashedPassword
     */
    public function setHashedPassword(string $hashedPassword): void
    {
        $this->password = $hashedPassword;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->password;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public static function createUser(string $id, string $name, string $email, string $password): self
    {
        return new self($id, $name,  $email, $password);
    }

}