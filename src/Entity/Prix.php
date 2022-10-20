<?php

namespace App\Entity;

use App\Repository\PrixRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrixRepository::class)]
class Prix
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToOne(inversedBy: 'prixes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $product = null;

    #[ORM\OneToMany(mappedBy: 'prix', targetEntity: Quantities::class, orphanRemoval: true)]
    private Collection $quantities;

    public function __construct()
    {
        //$this->product = new ArrayCollection();
        $this->quantities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


    public function getProduct(): ?Products
    {
        return $this->product;
    }

    public function setProduct(?Products $product): self
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return Collection<int, Quantities>
     */
    public function getQuantities(): Collection
    {
        return $this->quantities;
    }

    public function addQuantity(Quantities $quantity): self
    {
        if (!$this->quantities->contains($quantity)) {
            $this->quantities->add($quantity);
            $quantity->setPrix($this);
        }

        return $this;
    }

    public function removeQuantity(Quantities $quantity): self
    {
        if ($this->quantities->removeElement($quantity)) {
            // set the owning side to null (unless already changed)
            if ($quantity->getPrix() === $this) {
                $quantity->setPrix(null);
            }
        }

        return $this;
    }

    

}
