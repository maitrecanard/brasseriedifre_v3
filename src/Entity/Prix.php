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

    #[ORM\OneToOne(inversedBy: 'prix', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Quantities $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'prixes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $product = null;

    public function __construct()
    {
        //$this->product = new ArrayCollection();
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

    public function getQuantity(): ?Quantities
    {
        return $this->quantity;
    }

    public function setQuantity(Quantities $quantity): self
    {
        $this->quantity = $quantity;

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

    

}
