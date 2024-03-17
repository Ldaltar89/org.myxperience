<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 10)]
    private ?string $question_type = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question_audio = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $points = null;

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

    #[ORM\ManyToOne(inversedBy: 'examnsQuestion')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Examns $examns = null;

    #[ORM\OneToMany(targetEntity: Answers::class, mappedBy: 'QuestionAnswer', orphanRemoval: true)]
    private Collection $QuestionAnswer;

    #[ORM\OneToMany(targetEntity: UserQuestions::class, mappedBy: 'questionUserQuestion', orphanRemoval: true)]
    private Collection $questionUserQuestion;

    public function __construct()
    {
        $this->QuestionAnswer = new ArrayCollection();
        $this->questionUserQuestion = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

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

    public function getQuestionType(): ?string
    {
        return $this->question_type;
    }

    public function setQuestionType(string $question_type): static
    {
        $this->question_type = $question_type;

        return $this;
    }

    public function getQuestionImage(): ?string
    {
        return $this->question_image;
    }

    public function setQuestionImage(?string $question_image): static
    {
        $this->question_image = $question_image;

        return $this;
    }

    public function getQuestionAudio(): ?string
    {
        return $this->question_audio;
    }

    public function setQuestionAudio(?string $question_audio): static
    {
        $this->question_audio = $question_audio;

        return $this;
    }

    public function getPoints(): ?string
    {
        return $this->points;
    }

    public function setPoints(?string $points): static
    {
        $this->points = $points;

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

    public function getExamns(): ?Examns
    {
        return $this->examns;
    }

    public function setExamns(?Examns $examns): static
    {
        $this->examns = $examns;

        return $this;
    }

    /**
     * @return Collection<int, Answers>
     */
    public function getQuestionAnswer(): Collection
    {
        return $this->QuestionAnswer;
    }

    public function addQuestionAnswer(Answers $questionAnswer): static
    {
        if (!$this->QuestionAnswer->contains($questionAnswer)) {
            $this->QuestionAnswer->add($questionAnswer);
            $questionAnswer->setQuestionAnswer($this);
        }

        return $this;
    }

    public function removeQuestionAnswer(Answers $questionAnswer): static
    {
        if ($this->QuestionAnswer->removeElement($questionAnswer)) {
            // set the owning side to null (unless already changed)
            if ($questionAnswer->getQuestionAnswer() === $this) {
                $questionAnswer->setQuestionAnswer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserQuestions>
     */
    public function getQuestionUserQuestion(): Collection
    {
        return $this->questionUserQuestion;
    }

    public function addQuestionUserQuestion(UserQuestions $questionUserQuestion): static
    {
        if (!$this->questionUserQuestion->contains($questionUserQuestion)) {
            $this->questionUserQuestion->add($questionUserQuestion);
            $questionUserQuestion->setQuestionUserQuestion($this);
        }

        return $this;
    }

    public function removeQuestionUserQuestion(UserQuestions $questionUserQuestion): static
    {
        if ($this->questionUserQuestion->removeElement($questionUserQuestion)) {
            // set the owning side to null (unless already changed)
            if ($questionUserQuestion->getQuestionUserQuestion() === $this) {
                $questionUserQuestion->setQuestionUserQuestion(null);
            }
        }

        return $this;
    }
}
