<?php

namespace App\Entity;

use App\Repository\DataFileRepository;
use App\Traits\Timestapable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: DataFileRepository::class)]
class DataFile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["file"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["file"])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(["file"])]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $saved = null;

    #[ORM\Column(length: 255)]
    private ?string $unsaved = null;

    #[ORM\Column(length: 255)]
    private ?string $activeUser = null;

    #[ORM\OneToMany(mappedBy: 'file', targetEntity: LoopLog::class)]
    private Collection $loopLogs;

    #[ORM\Column(nullable: true)]
    #[Groups(["file"])]
    private ?array $response = null;

    use Timestapable;

    public function __construct()
    {
        $this->loopLogs = new ArrayCollection();
    }

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSaved(): ?string
    {
        return $this->saved;
    }

    public function setSaved(string $saved): static
    {
        $this->saved = $saved;

        return $this;
    }

    public function getUnsaved(): ?string
    {
        return $this->unsaved;
    }

    public function setUnsaved(string $unsaved): static
    {
        $this->unsaved = $unsaved;

        return $this;
    }

    public function getActiveUser(): ?string
    {
        return $this->activeUser;
    }

    public function setActiveUser(string $activeUser): static
    {
        $this->activeUser = $activeUser;

        return $this;
    }

    /**
     * @return Collection<int, LoopLog>
     */
    public function getLoopLogs(): Collection
    {
        return $this->loopLogs;
    }

    public function addLoopLog(LoopLog $loopLog): static
    {
        if (!$this->loopLogs->contains($loopLog)) {
            $this->loopLogs->add($loopLog);
            $loopLog->setFile($this);
        }

        return $this;
    }

    public function removeLoopLog(LoopLog $loopLog): static
    {
        if ($this->loopLogs->removeElement($loopLog)) {
            // set the owning side to null (unless already changed)
            if ($loopLog->getFile() === $this) {
                $loopLog->setFile(null);
            }
        }

        return $this;
    }

    public function getResponse(): ?array
    {
        return $this->response;
    }

    public function setResponse(?array $response): static
    {
        $this->response = $response;

        return $this;
    }
}