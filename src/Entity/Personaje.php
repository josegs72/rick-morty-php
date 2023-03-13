<?php

namespace App\Entity;

use App\Repository\PersonajeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonajeRepository::class)]
class Personaje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $species = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

   

    #[ORM\ManyToMany(targetEntity: Episodios::class, inversedBy: 'personajes')]
    private Collection $episodio;

    public function __construct()
    {
        $this->episodio = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSpecies(): ?string
    {
        return $this->species;
    }

    public function setSpecies(?string $species): self
    {
        $this->species = $species;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

  

    
    /**
     * @return Collection<int, Episodios>
     */
    public function getEpisodio(): Collection
    {
        return $this->episodio;
    }

    public function addEpisodio(Episodios $episodio): self
    {
        if (!$this->episodio->contains($episodio)) {
            $this->episodio->add($episodio);
        }

        return $this;
    }

    public function removeEpisodio(Episodios $episodio): self
    {
        $this->episodio->removeElement($episodio);

        return $this;
    }
}
