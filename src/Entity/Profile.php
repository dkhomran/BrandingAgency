<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $landingTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $landingSubTitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $landingDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $ceatedAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: ProjectsCategories::class)]
    private Collection $projectsCategories;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: ServicesCategories::class)]
    private Collection $servicesCategories;

    #[ORM\OneToMany(mappedBy: 'profile', targetEntity: Blogs::class)]
    private Collection $blogs;

    public function __construct()
    {
        $this->projectsCategories = new ArrayCollection();
        $this->servicesCategories = new ArrayCollection();
        $this->blogs = new ArrayCollection();
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

    public function getLandingTitle(): ?string
    {
        return $this->landingTitle;
    }

    public function setLandingTitle(?string $landingTitle): static
    {
        $this->landingTitle = $landingTitle;

        return $this;
    }

    public function getLandingSubTitle(): ?string
    {
        return $this->landingSubTitle;
    }

    public function setLandingSubTitle(?string $landingSubTitle): static
    {
        $this->landingSubTitle = $landingSubTitle;

        return $this;
    }

    public function getLandingDescription(): ?string
    {
        return $this->landingDescription;
    }

    public function setLandingDescription(?string $landingDescription): static
    {
        $this->landingDescription = $landingDescription;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCeatedAt(): ?\DateTimeInterface
    {
        return $this->ceatedAt;
    }

    public function setCeatedAt(\DateTimeInterface $ceatedAt): static
    {
        $this->ceatedAt = $ceatedAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, ProjectsCategories>
     */
    public function getProjectsCategories(): Collection
    {
        return $this->projectsCategories;
    }

    public function addProjectsCategory(ProjectsCategories $projectsCategory): static
    {
        if (!$this->projectsCategories->contains($projectsCategory)) {
            $this->projectsCategories->add($projectsCategory);
            $projectsCategory->setProfile($this);
        }

        return $this;
    }

    public function removeProjectsCategory(ProjectsCategories $projectsCategory): static
    {
        if ($this->projectsCategories->removeElement($projectsCategory)) {
            // set the owning side to null (unless already changed)
            if ($projectsCategory->getProfile() === $this) {
                $projectsCategory->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ServicesCategories>
     */
    public function getServicesCategories(): Collection
    {
        return $this->servicesCategories;
    }

    public function addServicesCategory(ServicesCategories $servicesCategory): static
    {
        if (!$this->servicesCategories->contains($servicesCategory)) {
            $this->servicesCategories->add($servicesCategory);
            $servicesCategory->setProfile($this);
        }

        return $this;
    }

    public function removeServicesCategory(ServicesCategories $servicesCategory): static
    {
        if ($this->servicesCategories->removeElement($servicesCategory)) {
            // set the owning side to null (unless already changed)
            if ($servicesCategory->getProfile() === $this) {
                $servicesCategory->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Blogs>
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blogs $blog): static
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs->add($blog);
            $blog->setProfile($this);
        }

        return $this;
    }

    public function removeBlog(Blogs $blog): static
    {
        if ($this->blogs->removeElement($blog)) {
            // set the owning side to null (unless already changed)
            if ($blog->getProfile() === $this) {
                $blog->setProfile(null);
            }
        }

        return $this;
    }
}
