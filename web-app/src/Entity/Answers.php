<?php

namespace App\Entity;

use App\Repository\AnswersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswersRepository::class)]
class Answers
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id = null;

    #[ORM\Column(length: 255)]
    private ?string $answer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question_image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $question_audio = null;

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

    #[ORM\ManyToOne(inversedBy: 'QuestionAnswer')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Questions $QuestionAnswer = null;

    #[ORM\OneToMany(targetEntity: UserAnswers::class, mappedBy: 'answerUserAnswer', orphanRemoval: true)]
    private Collection $answerUserAnswer;

    public function __construct()
    {
        $this->answerUserAnswer = new ArrayCollection();
    }

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getAnswer(): ?string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): static
    {
        $this->answer = $answer;

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

    public function getQuestionAnswer(): ?Questions
    {
        return $this->QuestionAnswer;
    }

    public function setQuestionAnswer(?Questions $QuestionAnswer): static
    {
        $this->QuestionAnswer = $QuestionAnswer;

        return $this;
    }

    /**
     * @return Collection<int, UserAnswers>
     */
    public function getAnswerUserAnswer(): Collection
    {
        return $this->answerUserAnswer;
    }

    public function addAnswerUserAnswer(UserAnswers $answerUserAnswer): static
    {
        if (!$this->answerUserAnswer->contains($answerUserAnswer)) {
            $this->answerUserAnswer->add($answerUserAnswer);
            $answerUserAnswer->setAnswerUserAnswer($this);
        }

        return $this;
    }

    public function removeAnswerUserAnswer(UserAnswers $answerUserAnswer): static
    {
        if ($this->answerUserAnswer->removeElement($answerUserAnswer)) {
            // set the owning side to null (unless already changed)
            if ($answerUserAnswer->getAnswerUserAnswer() === $this) {
                $answerUserAnswer->setAnswerUserAnswer(null);
            }
        }

        return $this;
    }
}
