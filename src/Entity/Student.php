<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_Student']], denormalizationContext: ['groups' => ['write_Student']])]
class Student extends User
{
 
    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_Student', 'write_Student'])]
    private $sexe;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2, nullable: true)]
    #[Groups(['read_Student', 'write_Student'])]
    private $global_note;

    #[ORM\Column(type: 'array', nullable: true)]
    #[Groups(['read_Student', 'write_Student'])]
    private $note = [];

    #[ORM\ManyToOne(targetEntity: Study::class, inversedBy: 'student')]
    #[Groups(['read_Student', 'write_Student'])]
    private $Studyplace;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_Student', 'write_Student'])]
    private $mail_parent;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: NoteMatiereStudent::class)]
    #[Groups(['read_Student', 'write_Student'])]
    private $noteMatiereStudents;

    public function __construct()
    {
        $this->matiere = new ArrayCollection();
        $this->noteMatiereStudents = new ArrayCollection();
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getGlobalNote(): ?string
    {
        return $this->global_note;
    }

    public function setGlobalNote(?string $global_note): self
    {
        $this->global_note = $global_note;

        return $this;
    }

    public function getNote(): ?array
    {
        return $this->note;
    }

    public function setNote(?array $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStudyplace(): ?Study
    {
        return $this->Studyplace;
    }

    public function setStudyplace(?Study $Studyplace): self
    {
        $this->Studyplace = $Studyplace;

        return $this;
    }

    public function getMailParent(): ?string
    {
        return $this->mail_parent;
    }

    public function setMailParent(string $mail_parent): self
    {
        $this->mail_parent = $mail_parent;

        return $this;
    }

    /**
     * @return Collection<int, NoteMatiereStudent>
     */
    public function getNoteMatiereStudents(): Collection
    {
        return $this->noteMatiereStudents;
    }

    public function addNoteMatiereStudent(NoteMatiereStudent $noteMatiereStudent): self
    {
        if (!$this->noteMatiereStudents->contains($noteMatiereStudent)) {
            $this->noteMatiereStudents[] = $noteMatiereStudent;
            $noteMatiereStudent->setStudent($this);
        }

        return $this;
    }

    public function removeNoteMatiereStudent(NoteMatiereStudent $noteMatiereStudent): self
    {
        if ($this->noteMatiereStudents->removeElement($noteMatiereStudent)) {
            // set the owning side to null (unless already changed)
            if ($noteMatiereStudent->getStudent() === $this) {
                $noteMatiereStudent->setStudent(null);
            }
        }

        return $this;
    }
}
