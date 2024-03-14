<?php

namespace App\Entity;

use App\Repository\SeasonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeasonRepository::class)]
class Season
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 100)]
  private ?string $name = null;

  #[ORM\Column(length: 10)]
  private ?string $season_year = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $description = null;

  #[ORM\Column(length: 255, nullable: true)]
  private ?string $image = null;

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

  public function getId(): ?int
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

  public function getSeasonYear(): ?string
  {
    return $this->season_year;
  }

  public function setSeasonYear(string $season_year): static
  {
    $this->season_year = $season_year;

    return $this;
  }

  public function getDescription(): ?string
  {
    return $this->description;
  }

  public function setDescription(string $description): static
  {
    $this->description = $description;

    return $this;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function setImage(?string $image): static
  {
    $this->image = $image;

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
}
