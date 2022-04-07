<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfessorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProfessorRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_Professor']], denormalizationContext: ['groups' => ['write_Professor']])]
class Professor extends User
{

    #[ORM\Column(type: 'decimal', precision: 2, scale: '0')]
    #[Groups(['read_Professor', 'read_Professor'])]
    private $age;

    #[ORM\Column(type: 'decimal', precision: 7, scale: 2)]
    #[Groups(['read_Professor', 'read_Professor'])]
    private $salary;

    #[ORM\Column(type: 'decimal', precision: 2, scale: '0', nullable: true)]
    #[Groups(['read_Professor', 'read_Professor'])]
    private $work_age;

    #[ORM\OneToOne(inversedBy: 'professor', targetEntity: Study::class, cascade: ['persist', 'remove'])]
    #[Groups(['read_Professor', 'read_Professor'])]
    private $studyplace;


    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getWorkAge(): ?string
    {
        return $this->work_age;
    }

    public function setWorkAge(?string $work_age): self
    {
        $this->work_age = $work_age;

        return $this;
    }

    public function getStudyplace(): ?Study
    {
        return $this->studyplace;
    }

    public function setStudyplace(?Study $studyplace): self
    {
        $this->studyplace = $studyplace;

        return $this;
    }
}
