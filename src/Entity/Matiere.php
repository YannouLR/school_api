<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MatiereRepository::class)]
#[ApiResource(normalizationContext:['groups' => ['read_Matiere']], denormalizationContext: ['groups' => ['write_Matiere']])]
class Matiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read_Matiere', 'write_Matiere'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read_Matiere', 'write_Matiere'])]
    private $title;

    #[ORM\ManyToMany(targetEntity: Study::class, mappedBy: 'subject')]
    #[Groups(['read_Matiere', 'write_Matiere'])]
    private $studies;

    #[ORM\OneToMany(mappedBy: 'matiere', targetEntity: NoteMatiereStudent::class)]
    #[Groups(['read_Matiere', 'write_Matiere'])]
    private $noteMatiereStudents;

    public function __construct()
    {
        $this->studies = new ArrayCollection();
        $this->noteMatiereStudents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, Study>
     */
    public function getStudies(): Collection
    {
        return $this->studies;
    }

    public function addStudy(Study $study): self
    {
        if (!$this->studies->contains($study)) {
            $this->studies[] = $study;
            $study->addSubject($this);
        }

        return $this;
    }

    public function removeStudy(Study $study): self
    {
        if ($this->studies->removeElement($study)) {
            $study->removeSubject($this);
        }

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
            $noteMatiereStudent->setMatiere($this);
        }

        return $this;
    }

    public function removeNoteMatiereStudent(NoteMatiereStudent $noteMatiereStudent): self
    {
        if ($this->noteMatiereStudents->removeElement($noteMatiereStudent)) {
            // set the owning side to null (unless already changed)
            if ($noteMatiereStudent->getMatiere() === $this) {
                $noteMatiereStudent->setMatiere(null);
            }
        }

        return $this;
    }

}
