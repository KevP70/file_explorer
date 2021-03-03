<?php

namespace App\Entity;

use App\Repository\FilesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilesRepository::class)
 */
class Files
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
     * @ORM\Column(type="string", length=255)
     */
    private $file_url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    /**
     * @ORM\Column(type="integer")
     */
    private $download;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="files_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category_id;

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

    public function getFileUrl(): ?string
    {
        return $this->file_url;
    }

    public function setFileUrl(string $file_url): self
    {
        $this->file_url = $file_url;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getDownload(): ?int
    {
        return $this->download;
    }

    public function setDownload(int $download): self
    {
        $this->download = $download;

        return $this;
    }

    public function getCategoryId(): ?Categories
    {
        return $this->category_id;
    }

    public function setCategoryId(?Categories $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }
}
