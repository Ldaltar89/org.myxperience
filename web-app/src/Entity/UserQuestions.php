<?php

namespace App\Entity;

use App\Repository\UserQuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserQuestionsRepository::class)]
class UserQuestions
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $points = null;

    #[ORM\Column]
    private ?bool $correct = null;

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

    #[ORM\ManyToOne(inversedBy: 'userExamnUserQuestion')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserExamns $userExamnUserQuestion = null;

    #[ORM\ManyToOne(inversedBy: 'questionUserQuestion')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $questionUserQuestion = null;

    #[ORM\OneToMany(targetEntity: UserAnswers::class, mappedBy: 'userQuestionUserAnswer', orphanRemoval: true)]
    private Collection $userQuestionUserAnswer;

    public function __construct()
    {
        $this->userQuestionUserAnswer = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getPoints(): ?string
    {
        return $this->points;
    }

    public function setPoints(string $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->correct;
    }

    public function setCorrect(bool $correct): static
    {
        $this->correct = $correct;

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

    public function getUserExamnUserQuestion(): ?UserExamns
    {
        return $this->userExamnUserQuestion;
    }

    public function setUserExamnUserQuestion(?UserExamns $userExamnUserQuestion): static
    {
        $this->userExamnUserQuestion = $userExamnUserQuestion;

        return $this;
    }

    public function getQuestionUserQuestion(): ?Questions
    {
        return $this->questionUserQuestion;
    }

    public function setQuestionUserQuestion(?Questions $questionUserQuestion): static
    {
        $this->questionUserQuestion = $questionUserQuestion;

        return $this;
    }

    /**
     * @return Collection<int, UserAnswers>
     */
    public function getUserQuestionUserAnswer(): Collection
    {
        return $this->userQuestionUserAnswer;
    }

    public function addUserQuestionUserAnswer(UserAnswers $userQuestionUserAnswer): static
    {
        if (!$this->userQuestionUserAnswer->contains($userQuestionUserAnswer)) {
            $this->userQuestionUserAnswer->add($userQuestionUserAnswer);
            $userQuestionUserAnswer->setUserQuestionUserAnswer($this);
        }

        return $this;
    }

    public function removeUserQuestionUserAnswer(UserAnswers $userQuestionUserAnswer): static
    {
        if ($this->userQuestionUserAnswer->removeElement($userQuestionUserAnswer)) {
            // set the owning side to null (unless already changed)
            if ($userQuestionUserAnswer->getUserQuestionUserAnswer() === $this) {
                $userQuestionUserAnswer->setUserQuestionUserAnswer(null);
            }
        }

        return $this;
    }
}
