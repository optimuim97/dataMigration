<?php

namespace App\Entity;

use App\Repository\LoopLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: LoopLogRepository::class)]
class LoopLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["log"])]
    private ?string $statusCode = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(["log"])]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    #[Groups(["log"])]
    private ?string $position = null;

    #[ORM\Column]
    #[Groups(["log"])]
    private ?bool $isLoopError = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(["log"])]
    private ?string $logDescription = null;

    #[ORM\ManyToOne(inversedBy: 'loopLogs')]
    private ?DataFile $file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profilID = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isSuccess = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $metaData = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatusCode(): ?string
    {
        return $this->statusCode;
    }

    public function setStatusCode(string $statusCode): static
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): static
    {
        $this->position = $position;

        return $this;
    }

    public function isIsLoopError(): ?bool
    {
        return $this->isLoopError;
    }

    public function setIsLoopError(bool $isLoopError): static
    {
        $this->isLoopError = $isLoopError;

        return $this;
    }

    public function getLogDescription(): ?string
    {
        return $this->logDescription;
    }

    public function setLogDescription(?string $logDescription): static
    {
        $this->logDescription = $logDescription;
        return $this;
    }

    public function getFile(): ?DataFile
    {
        return $this->file;
    }

    public function setFile(?DataFile $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function getProfilID(): ?string
    {
        return $this->profilID;
    }

    public function setProfilID(?string $profilID): static
    {
        $this->profilID = $profilID;

        return $this;
    }

    public function isIsSuccess(): ?bool
    {
        return $this->isSuccess;
    }

    public function setIsSuccess(?bool $isSuccess): static
    {
        $this->isSuccess = $isSuccess;

        return $this;
    }

    public function getMetaData(): ?string
    {
        return $this->metaData;
    }

    public function setMetaData(string $metaData): static
    {
        $this->metaData = $metaData;

        return $this;
    }
}
