<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $DateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrixInscription;

    /**
     * @ORM\ManyToMany(targetEntity=Promotion::class, inversedBy="evenements")
     */
    private $promotions;

    /**
     * @ORM\ManyToMany(targetEntity=Postulant::class, inversedBy="evenements")
     */
    private $postulants;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
        $this->postulants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getDateDebut(): ?string
    {
        return $this->DateDebut;
    }

    public function setDateDebut(string $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->DateFin;
    }

    public function setDateFin(string $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getPrixInscription(): ?string
    {
        return $this->PrixInscription;
    }

    public function setPrixInscription(string $PrixInscription): self
    {
        $this->PrixInscription = $PrixInscription;

        return $this;
    }

    /**
     * @return Collection|Promotion[]
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        $this->promotions->removeElement($promotion);

        return $this;
    }

    /**
     * @return Collection|Postulant[]
     */
    public function getPostulants(): Collection
    {
        return $this->postulants;
    }

    public function addPostulant(Postulant $postulant): self
    {
        if (!$this->postulants->contains($postulant)) {
            $this->postulants[] = $postulant;
        }

        return $this;
    }

    public function removePostulant(Postulant $postulant): self
    {
        $this->postulants->removeElement($postulant);

        return $this;
    }
}