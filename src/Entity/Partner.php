<?php

namespace App\Entity;

use App\Repository\PartnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartnerRepository::class)]
class Partner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 15)]
    private ?string $phone = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(nullable: true)]
    private ?int $active = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'partner')]
    private ?HistoricMovement $historicMovement = null;

    #[ORM\OneToMany(mappedBy: 'partner', targetEntity: HistoricMovement::class)]
    private Collection $historicMovements;

    public function __construct()
    {
        $this->historicMovements = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

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
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getHistoricMovement(): ?HistoricMovement
    {
        return $this->historicMovement;
    }

    public function setHistoricMovement(?HistoricMovement $historicMovement): self
    {
        $this->historicMovement = $historicMovement;

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
            $historicMovement->setPartner($this);
        }

        return $this;
    }

    public function removeHistoricMovement(HistoricMovement $historicMovement): self
    {
        if ($this->historicMovements->removeElement($historicMovement)) {
            // set the owning side to null (unless already changed)
            if ($historicMovement->getPartner() === $this) {
                $historicMovement->setPartner(null);
            }
        }

        return $this;
    }
}
