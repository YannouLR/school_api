<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: StudyRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_Study']], denormalizationContext: ['groups' => ['write_Study']])]
class Study
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_Study', 'write_Study'])]
    private $id;

    #[ORM\OneToMany(mappedBy: 'Studyplace', targetEntity: Student::class)]
    #[Groups(['read_Study', 'write_Study'])]
    private $student;

    #[ORM\OneToOne(mappedBy: 'studyplace', targetEntity: Professor::class, cascade: ['persist', 'remove'])]
    #[Groups(['read_Study', 'write_Study'])]
    private $professor;

    #[ORM\ManyToMany(targetEntity: Matiere::class, inversedBy: 'studies')]
    #[Groups(['read_Study', 'write_Study'])]
    private $subject;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_Study', 'write_Study'])]
    private $name;

    public function __construct()
    {
        $this->student = new ArrayCollection();
        $this->subject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Student>
     */
    public function getStudent(): Collection
    {
        return $this->student;
    }

    public function addStudent(Student $student): self
    {
        if (!$this->student->contains($student)) {
            $this->student[] = $student;
            $student->setStudyplace($this);
        }

        return $this;
    }

    public function removeStudent(Student $student): self
    {
        if ($this->student->removeElement($student)) {
            // set the owning side to null (unless already changed)
            if ($student->getStudyplace() === $this) {
                $student->setStudyplace(null);
            }
        }

        return $this;
    }

    public function getProfessor(): ?Professor
    {
        return $this->professor;
    }

    public function setProfessor(?Professor $professor): self
    {
        // unset the owning side of the relation if necessary
        if ($professor === null && $this->professor !== null) {
            $this->professor->setStudyplace(null);
        }

        // set the owning side of the relation if necessary
        if ($professor !== null && $professor->getStudyplace() !== $this) {
            $professor->setStudyplace($this);
        }

        $this->professor = $professor;

        return $this;
    }

    /**
     * @return Collection<int, Matiere>
     */
    public function getSubject(): Collection
    {
        return $this->subject;
    }

    public function addSubject(Matiere $subject): self
    {
        if (!$this->subject->contains($subject)) {
            $this->subject[] = $subject;
        }

        return $this;
    }

    public function removeSubject(Matiere $subject): self
    {
        $this->subject->removeElement($subject);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
