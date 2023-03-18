<?php

namespace App\Entity;

use App\Repository\FruitsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FruitsRepository::class)
 */
class Fruits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="ascii_string")
     */
    private $name;

    /**
     * @ORM\Column(type="ascii_string")
     */
    private $family;

    /**
     * @ORM\Column(type="ascii_string")
     */
    private $orders;
    /**
     * @ORM\Column(type="ascii_string")
     */
    private $genus;
    /**
     * @ORM\Column(type="ascii_string")
     */
    private $carbohydrates;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=10, scale=2)
     */
    private $protein;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=10, scale=2)
     */
    private $fat;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=10, scale=2)
     */
    private $calories;
    /**
     * @ORM\Column(type="decimal", nullable=true, precision=10, scale=2)
     */
    private $sugar;

    public function getId(): ?int{
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name): self{
        $this->name = $name;
        return $this;
    }

    public function getFamily(){
        return $this->family;
    }

    public function setFamily($family): self{
        $this->family = $family;
        return $this;
    }

    public function getOrders(){
        return $this->orders;
    }

    public function setOrders($orders): self{
        $this->orders = $orders;
        return $this;
    }

    public function getGenus(){
        return $this->genus;
    }

    public function setGenus($genus): self{
        $this->genus = $genus;
        return $this;
    }

    public function getCarbohydrates(){
        return $this->carbohydrates;
    }

    public function setCarbohydrates($carbohydrates): self{
        $this->carbohydrates = $carbohydrates;
        return $this;
    }

    public function getProtein(){
        return $this->protein;
    }

    public function setProtein($protein): self{
        $this->protein = $protein;
        return $this;
    }

    public function getFat(){
        return $this->fat;
    }

    public function setFat($fat): self{
        $this->fat = $fat;
        return $this;
    }

    public function getCalories(){
        return $this->calories;
    }

    public function setCalories($calories): self{
        $this->calories = $calories;
        return $this;
    }
    
    public function getSugar(){
        return $this->sugar;
    }

    public function setSugar($sugar): self{
        $this->sugar = $sugar;
        return $this;
    }
}
