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

    #[ORM\Column(type: Types::TEXT,nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 300)]
    private ?string $image = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $degre = null;

    #[ORM\Column(type: Types::TEXT,nullable: true)]
    private ?string $content = null;

    #[ORM\Column(nullable: true)]
    private ?int $vue = null;

    #[ORM\Column(nullable: true)]
    private ?int $active = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: HistoricMovement::class)]
    private Collection $historicMovements;

    #[ORM\ManyToOne(inversedBy: 'product')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categorie = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Prix::class, orphanRemoval: true)]
    private Collection $prixes;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $period = null;

    #[ORM\Column(nullable: true)]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $story = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $temp = null;

    #[ORM\Column(length: 300, nullable: true)]
    private ?string $type = null;

    public function __construct()
    {
        $this->quantityPrixes = new ArrayCollection();
        $this->historicMovements = new ArrayCollection();
        $this->prix = new ArrayCollection();
        $this->prixes = new ArrayCollection();
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

    public function setDescription(?string $description): self
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

    public function setContent(?string $content): self
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
     * @return Collection<int, HistoricMovement>
     */
    public function getHistoricMovements(): Collection
    {
        return $this->historicMovements;
    }

    public function addHistoricMovement(HistoricMovement $historicMovement): self
    {
        if (!$this->historicMovements->contains($historicMovement)) {
            $this->historicMovements->add($historicMovement);
            $historicMovement->setProduct($this);
        }

        return $this;
    }

    public function removeHistoricMovement(HistoricMovement $historicMovement): self
    {
        if ($this->historicMovements->removeElement($historicMovement)) {
            // set the owning side to null (unless already changed)
            if ($historicMovement->getProduct() === $this) {
                $historicMovement->setProduct(null);
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

    /**
     * @return Collection<int, Prix>
     */
    public function getPrixes(): Collection
    {
        return $this->prixes;
    }

    public function addPrix(Prix $prix): self
    {
        if (!$this->prixes->contains($prix)) {
            $this->prixes->add($prix);
            $prix->setProduct($this);
        }

        return $this;
    }

    public function removePrix(Prix $prix): self
    {
        if ($this->prixes->removeElement($prix)) {
            // set the owning side to null (unless already changed)
            if ($prix->getProduct() === $this) {
                $prix->setProduct(null);
            }
        }

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(?string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getStory(): ?string
    {
        return $this->story;
    }

    public function setStory(?string $story): self
    {
        $this->story = $story;

        return $this;
    }

    public function getTemp(): ?string
    {
        return $this->temp;
    }

    public function setTemp(?string $temp): self
    {
        $this->temp = $temp;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    
}
