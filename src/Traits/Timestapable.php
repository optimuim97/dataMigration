<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\PreUpdate;
use Symfony\Component\Serializer\Annotation\Groups;

trait Timestapable
{

    #[ORM\Column(type: "datetime", nullable: true)]
    #[Groups(["list_recipes", "user_info", "show_recipe", "show_order","comment_list", "show_restaurant"])]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type: "datetime", nullable: true)]
    #[Groups(["list_recipes", "user_info", "show_recipe", "show_order", "comment_list", "show_restaurant"])]
    private ?\DateTimeInterface $updatedAt;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    #[PrePersist]
    public function addCreatedAt()
    {
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->setUpdatedAt(new \DateTimeImmutable());
    }

    #[PreUpdate]
    public function addUpdatedAt()
    {
        $this->setUpdatedAt(new \DateTimeImmutable());
    }
}
