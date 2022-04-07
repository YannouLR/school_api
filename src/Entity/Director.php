<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DirectorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DirectorRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_Director']], denormalizationContext: ['groups' => ['write_Director']])]
class Director extends User
{

}
