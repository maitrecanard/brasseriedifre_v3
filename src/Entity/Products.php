<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(length: 150)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 300)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $degre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(nullable: true)]
    private ?int $vue = null;

    #[ORM\Column(nullable: true)]
    private ?int $active = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: QuantityPrix::class, orphanRemoval: true)]
    private Collection $quantityPrixes;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categorie = null;

    public function __construct()
    {
        $this->quantityPrixes = new ArrayCollection();
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

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDegre(): ?string
    {
        return $this->degre;
    }

    public function setDegre(?string $degre): self
    {
        $this->degre = $degre;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getVue(): ?int
    {
        return $this->vue;
    }

    public function setVue(?int $vue): self
    {
        $this->vue = $vue;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, QuantityPrix>
     */
    public function getQuantityPrixes(): Collection
    {
        return $this->quantityPrixes;
    }

    public function addQuantityPrix(QuantityPrix $quantityPrix): self
    {
        if (!$this->quantityPrixes->contains($quantityPrix)) {
            $this->quantityPrixes->add($quantityPrix);
            $quantityPrix->setProduct($this);
        }

        return $this;
    }

    public function removeQuantityPrix(QuantityPrix $quantityPrix): self
    {
        if ($this->quantityPrixes->removeElement($quantityPrix)) {
            // set the owning side to null (unless already changed)
            if ($quantityPrix->getProduct() === $this) {
                $quantityPrix->setProduct(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
