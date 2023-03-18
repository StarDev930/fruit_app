<?php

namespace App\Entity;

use App\Repository\FavFruitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavFruitsRepository::class)
 */
class FavFruits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $fruit_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFruitId(): ?string
    {
        return $this->fruit_id;
    }

    public function setFruitId(string $fruit_id): self
    {
        $this->fruit_id = $fruit_id;

        return $this;
    }
}
