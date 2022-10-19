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

    #[ORM\Column]
    private ?int $QuatitiesId = null;

    #[ORM\Column]
    private ?int $Products_id = null;

    #[ORM\ManyToOne(inversedBy: 'prix')]
    private ?Products $products = null;



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

    public function getQuatitiesId(): ?int
    {
        return $this->QuatitiesId;
    }

    public function setQuatitiesId(int $QuatitiesId): self
    {
        $this->QuatitiesId = $QuatitiesId;

        return $this;
    }

    public function getProductsId(): ?int
    {
        return $this->Products_id;
    }

    public function setProductsId(int $Products_id): self
    {
        $this->Products_id = $Products_id;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->products;
    }

    public function setProducts(?Products $products): self
    {
        $this->products = $products;

        return $this;
    }

}
