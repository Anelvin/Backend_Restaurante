<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantesRepository")
 */
class Restaurantes
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mesas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capacidad_mesas;

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

    public function getMesas(): ?string
    {
        return $this->mesas;
    }

    public function setMesas(string $mesas): self
    {
        $this->mesas = $mesas;

        return $this;
    }

    public function getCapacidadMesas(): ?string
    {
        return $this->capacidad_mesas;
    }

    public function setCapacidadMesas(string $capacidad_mesas): self
    {
        $this->capacidad_mesas = $capacidad_mesas;

        return $this;
    }
}
