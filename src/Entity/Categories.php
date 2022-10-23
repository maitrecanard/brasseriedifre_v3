<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: HistoricMovement::class)]
    private Collection $historicMovements;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Products::class, orphanRemoval: true)]
    private Collection $product;


    public function __construct()
    {
        $this->historicMovements = new ArrayCollection();
        $this->product = new ArrayCollection();
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
            $historicMovement->setCategory($this);
        }

        return $this;
    }

    public function removeHistoricMovement(HistoricMovement $historicMovement): self
    {
        if ($this->historicMovements->removeElement($historicMovement)) {
            // set the owning side to null (unless already changed)
            if ($historicMovement->getCategory() === $this) {
                $historicMovement->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->product;
    }

    public function addProducts(Products $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
            $product->setCategorie($this);
        }

        return $this;
    }

    public function removeProducts(Products $product): self
    {
        if ($this->product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategorie() === $this) {
                $product->setCategorie(null);
            }
        }

        return $this;
    }

}
