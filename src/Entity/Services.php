<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $typeService = null;

    #[ORM\Column(length: 255)]
    private ?string $serviceTitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $serviceDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $serviceDetails = [];

    #[ORM\ManyToOne(inversedBy: 'services')]
    private ?ServicesCategories $categorie = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTypeService(): ?int
    {
        return $this->typeService;
    }

    public function setTypeService(int $typeService): static
    {
        $this->typeService = $typeService;

        return $this;
    }

    public function getServiceTitle(): ?string
    {
        return $this->serviceTitle;
    }

    public function setServiceTitle(string $serviceTitle): static
    {
        $this->serviceTitle = $serviceTitle;

        return $this;
    }

    public function getServiceDescription(): ?string
    {
        return $this->serviceDescription;
    }

    public function setServiceDescription(string $serviceDescription): static
    {
        $this->serviceDescription = $serviceDescription;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getServiceDetails(): array
    {
        return $this->serviceDetails;
    }

    public function setServiceDetails(array $serviceDetails): static
    {
        $this->serviceDetails = $serviceDetails;

        return $this;
    }

    public function getCategorie(): ?ServicesCategories
    {
        return $this->categorie;
    }

    public function setCategorie(?ServicesCategories $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
