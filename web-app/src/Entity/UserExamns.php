<?php

namespace App\Entity;

use App\Repository\UserExamnsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserExamnsRepository::class)]
class UserExamns
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column]
    private ?bool $isDone = null;

    #[ORM\Column]
    private ?bool $isApproved = null;

    #[ORM\Column]
    private ?bool $isCanceled = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $score = null;

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

    #[ORM\ManyToOne(inversedBy: '_userExamn')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $_userExamn = null;

    #[ORM\ManyToOne(inversedBy: 'seasonUserExamn')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Season $seasonUserExamn = null;

    #[ORM\ManyToOne(inversedBy: 'examnUserExamn')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Examns $examnUserExamn = null;

    #[ORM\OneToMany(targetEntity: UserQuestions::class, mappedBy: 'userExamnUserQuestion', orphanRemoval: true)]
    private Collection $userExamnUserQuestion;

    public function __construct()
    {
        $this->userExamnUserQuestion = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function isIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): static
    {
        $this->isDone = $isDone;

        return $this;
    }

    public function isIsApproved(): ?bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): static
    {
        $this->isApproved = $isApproved;

        return $this;
    }

    public function isIsCanceled(): ?bool
    {
        return $this->isCanceled;
    }

    public function setIsCanceled(bool $isCanceled): static
    {
        $this->isCanceled = $isCanceled;

        return $this;
    }

    public function getScore(): ?string
    {
        return $this->score;
    }

    public function setScore(string $score): static
    {
        $this->score = $score;

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

    public function getUserExamn(): ?User
    {
        return $this->_userExamn;
    }

    public function setUserExamn(?User $_userExamn): static
    {
        $this->_userExamn = $_userExamn;

        return $this;
    }

    public function getSeasonUserExamn(): ?Season
    {
        return $this->seasonUserExamn;
    }

    public function setSeasonUserExamn(?Season $seasonUserExamn): static
    {
        $this->seasonUserExamn = $seasonUserExamn;

        return $this;
    }

    public function getExamnUserExamn(): ?Examns
    {
        return $this->examnUserExamn;
    }

    public function setExamnUserExamn(?Examns $examnUserExamn): static
    {
        $this->examnUserExamn = $examnUserExamn;

        return $this;
    }

    /**
     * @return Collection<int, UserQuestions>
     */
    public function getUserExamnUserQuestion(): Collection
    {
        return $this->userExamnUserQuestion;
    }

    public function addUserExamnUserQuestion(UserQuestions $userExamnUserQuestion): static
    {
        if (!$this->userExamnUserQuestion->contains($userExamnUserQuestion)) {
            $this->userExamnUserQuestion->add($userExamnUserQuestion);
            $userExamnUserQuestion->setUserExamnUserQuestion($this);
        }

        return $this;
    }

    public function removeUserExamnUserQuestion(UserQuestions $userExamnUserQuestion): static
    {
        if ($this->userExamnUserQuestion->removeElement($userExamnUserQuestion)) {
            // set the owning side to null (unless already changed)
            if ($userExamnUserQuestion->getUserExamnUserQuestion() === $this) {
                $userExamnUserQuestion->setUserExamnUserQuestion(null);
            }
        }

        return $this;
    }
}
