<?php

namespace App\Entity;

use App\Repository\ExamnsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExamnsRepository::class)]
class Examns
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $score = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $score_pass = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 100)]
    private ?string $createdBy = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $updatedBy = null;

    #[ORM\ManyToOne(inversedBy: 'examn_type')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ExamnsType $examnsType = null;

    #[ORM\ManyToOne(inversedBy: 'seasons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Season $season = null;

    #[ORM\OneToMany(targetEntity: Questions::class, mappedBy: 'examns', orphanRemoval: true)]
    private Collection $examnsQuestion;

    #[ORM\OneToMany(targetEntity: UserExamns::class, mappedBy: 'examnUserExamn', orphanRemoval: true)]
    private Collection $examnUserExamn;

    public function __construct()
    {
        $this->examnsQuestion = new ArrayCollection();
        $this->examnUserExamn = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(?string $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getScorePass(): ?string
    {
        return $this->score_pass;
    }

    public function setScorePass(?string $score_pass): static
    {
        $this->score_pass = $score_pass;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): static
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getExamnsType(): ?ExamnsType
    {
        return $this->examnsType;
    }

    public function setExamnsType(?ExamnsType $examnsType): static
    {
        $this->examnsType = $examnsType;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): static
    {
        $this->season = $season;

        return $this;
    }

    /**
     * @return Collection<int, Questions>
     */
    public function getExamnsQuestion(): Collection
    {
        return $this->examnsQuestion;
    }

    public function addExamnsQuestion(Questions $examnsQuestion): static
    {
        if (!$this->examnsQuestion->contains($examnsQuestion)) {
            $this->examnsQuestion->add($examnsQuestion);
            $examnsQuestion->setExamns($this);
        }

        return $this;
    }

    public function removeExamnsQuestion(Questions $examnsQuestion): static
    {
        if ($this->examnsQuestion->removeElement($examnsQuestion)) {
            // set the owning side to null (unless already changed)
            if ($examnsQuestion->getExamns() === $this) {
                $examnsQuestion->setExamns(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserExamns>
     */
    public function getExamnUserExamn(): Collection
    {
        return $this->examnUserExamn;
    }

    public function addExamnUserExamn(UserExamns $examnUserExamn): static
    {
        if (!$this->examnUserExamn->contains($examnUserExamn)) {
            $this->examnUserExamn->add($examnUserExamn);
            $examnUserExamn->setExamnUserExamn($this);
        }

        return $this;
    }

    public function removeExamnUserExamn(UserExamns $examnUserExamn): static
    {
        if ($this->examnUserExamn->removeElement($examnUserExamn)) {
            // set the owning side to null (unless already changed)
            if ($examnUserExamn->getExamnUserExamn() === $this) {
                $examnUserExamn->setExamnUserExamn(null);
            }
        }

        return $this;
    }
}
