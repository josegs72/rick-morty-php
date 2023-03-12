<?php

namespace App\Entity;

use App\Repository\EpisodiosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodiosRepository::class)]
class Episodios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $episodio = null;

    #[ORM\ManyToMany(targetEntity: Personaje::class, mappedBy: 'episodio')]
    private Collection $personajes;

    public function __construct()
    {
        $this->personajes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEpisodio(): ?string
    {
        return $this->episodio;
    }

    public function setEpisodio(string $episodio): self
    {
        $this->episodio = $episodio;

        return $this;
    }

    /**
     * @return Collection<int, Personaje>
     */
    public function getPersonajes(): Collection
    {
        return $this->personajes;
    }

    public function addPersonaje(Personaje $personaje): self
    {
        if (!$this->personajes->contains($personaje)) {
            $this->personajes->add($personaje);
            $personaje->addEpisodio($this);
        }

        return $this;
    }

    public function removePersonaje(Personaje $personaje): self
    {
        if ($this->personajes->removeElement($personaje)) {
            $personaje->removeEpisodio($this);
        }

        return $this;
    }
}
