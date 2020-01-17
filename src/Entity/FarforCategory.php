<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FarforCategoryRepository")
 */
class FarforCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Farfor", mappedBy="farforCategory")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Farfor[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function addCategory(Farfor $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
            $category->setFarforCategory($this);
        }

        return $this;
    }

    public function removeCategory(Farfor $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getFarforCategory() === $this) {
                $category->setFarforCategory(null);
            }
        }

        return $this;
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

public function __toString()
    {
	      return $this->getName();
}


}
