<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatureRepository")
 */
class Candidature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Entreprise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Localisation;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_envoi;

    /**
     * @ORM\Column(type="date")
     */
    private $Mise_a_jour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Lien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Plateforme;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etape", inversedBy="candidatures")
     */
    private $etape;

    public function __construct()
    {
        $this->Rdv = new ArrayCollection();
        $now = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        $this->setDateEnvoi($now);
        $this->setMiseAJour($now);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->Entreprise;
    }

    public function setEntreprise(string $Entreprise): self
    {
        $this->Entreprise = $Entreprise;

        return $this;
    }

    public function getContrat(): ?string
    {
        return $this->Contrat;
    }

    public function setContrat(string $Contrat): self
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(?string $Localisation): self
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->Date_envoi;
    }

    public function setDateEnvoi(\DateTimeInterface $Date_envoi): self
    {
        $this->Date_envoi = $Date_envoi;

        return $this;
    }

    public function getMiseAJour(): ?\DateTimeInterface
    {
        return $this->Mise_a_jour;
    }

    public function setMiseAJour(\DateTimeInterface $Mise_a_jour): self
    {
        $this->Mise_a_jour = $Mise_a_jour;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(?string $Lien): self
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getPlateforme(): ?string
    {
        return $this->Plateforme;
    }

    public function setPlateforme(?string $Plateforme): self
    {
        $this->Plateforme = $Plateforme;

        return $this;
    }

    public function getEtape(): ?Etape
    {
        return $this->etape;
    }

    public function setEtape(?Etape $etape): self
    {
        $this->etape = $etape;

        return $this;
    }
}
