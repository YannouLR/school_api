<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NoteMatiereStudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: NoteMatiereStudentRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_NoteMatiereStudent']], denormalizationContext: ['groups' => ['write_NoteMatiereStudent']])]
class NoteMatiereStudent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_NoteMatiereStudent', 'write_NoteMatiereStudent'])]
    private $id;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2, nullable: true)]
    #[Groups(['read_NoteMatiereStudent', 'write_NoteMatiereStudent'])]
    private $note;

    #[ORM\ManyToOne(targetEntity: Student::class, inversedBy: 'noteMatiereStudents')]
    #[Groups(['read_NoteMatiereStudent', 'write_NoteMatiereStudent'])]
    private $student;

    #[ORM\ManyToOne(targetEntity: Matiere::class, inversedBy: 'noteMatiereStudents')]
    #[Groups(['read_NoteMatiereStudent', 'write_NoteMatiereStudent'])]
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

}
