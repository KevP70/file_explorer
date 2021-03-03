<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=files::class, mappedBy="category_id")
     */
    private $files_id;

    public function __construct()
    {
        $this->files_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|files[]
     */
    public function getFilesId(): Collection
    {
        return $this->files_id;
    }

    public function addFilesId(files $filesId): self
    {
        if (!$this->files_id->contains($filesId)) {
            $this->files_id[] = $filesId;
            $filesId->setCategoryId($this);
        }

        return $this;
    }

    public function removeFilesId(files $filesId): self
    {
        if ($this->files_id->removeElement($filesId)) {
            // set the owning side to null (unless already changed)
            if ($filesId->getCategoryId() === $this) {
                $filesId->setCategoryId(null);
            }
        }

        return $this;
    }
}
