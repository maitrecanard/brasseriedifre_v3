<?php

namespace App\Entity;

use App\Repository\QuantitiesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuantitiesRepository::class)]
class Quantities
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\OneToOne(mappedBy: 'quantity', cascade: ['persist', 'remove'])]
    private ?Prix $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrix(): ?Prix
    {
        return $this->prix;
    }

    public function setPrix(Prix $prix): self
    {
        // set the owning side of the relation if necessary
        if ($prix->getQuantity() !== $this) {
            $prix->setQuantity($this);
        }

        $this->prix = $prix;

        return $this;
    }

   
}
