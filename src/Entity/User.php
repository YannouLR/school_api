<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\InheritanceType;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ApiResource(normalizationContext:['groups' => ['read_User']], denormalizationContext: ['groups' => ['write_User']])]


#[InheritanceType("JOINED")]
#[DiscriminatorColumn(name: "status", type: "string")]
#[DiscriminatorMap(["Student","Professor","Director", "User", "Study"])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_User', 'write_User', 'read_Student', 'write_Student', 'read_Study', 'write_Study'])]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(['read_User', 'write_User', 'read_Student', 'write_Student', 'read_Study', 'write_Study'])]
    private $email;

    #[ORM\Column(type: 'json')]
    #[Groups(['read_User', 'write_User', 'read_Student', 'write_Student', 'read_Study', 'write_Study'])]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    #[Groups(['read_User', 'write_User'])]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_User', 'write_User', 'read_Student', 'write_Student', 'read_Study', 'write_Study'])]
    private $firstname;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_User', 'write_User','read_Student', 'write_Student', 'read_Study', 'write_Study'])]
    private $lastname;

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->lastname;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}