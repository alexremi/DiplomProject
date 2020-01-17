<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductCategory", inversedBy="category")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productCategory;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Image2", mappedBy="post2", cascade={"remove"},orphanRemoval=true)
     */
    private $image2s;

    public function __construct()
    {
        $this->image2s = new ArrayCollection();
    }

        public function getId(): ?int
    {
        return $this->id;
    }

	public function getName()
                                                                         {
                                                                             return $this->name;
                                                                         }

	public function getDescription()
                                                                         {
                                                                             return $this->description;
                                                                         }

	public function setDescription($description)
                                                                         {
                                                                             $this->description = $description;
                                                                         }

	public function setName($name)
                                                                         {
                                                                             $this->name = $name;
                                                                         }

    public function getProductCategory(): ?ProductCategory
    {
        return $this->productCategory;
    }

    public function setProductCategory(?ProductCategory $productCategory): self
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * @return Collection|Image2[]
     */
    public function getImage2s(): Collection
    {
        return $this->image2s;
    }

    public function addImage2(Image2 $image2): self
    {
        if (!$this->image2s->contains($image2)) {
            $this->image2s[] = $image2;
            $image2->setPost2($this);
        }

        return $this;
    }

    public function removeImage2(Image2 $image2): self
    {
        if ($this->image2s->contains($image2)) {
            $this->image2s->removeElement($image2);
            // set the owning side to null (unless already changed)
            if ($image2->getPost2() === $this) {
                $image2->setPost2(null);
            }
        }

        return $this;
    }




}
