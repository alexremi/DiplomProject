<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\Type\DateType;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image
{

    private const SERVER_PATH_TO_IMAGE_FOLDER = '/var/www/my-project/public/uploads/';
    private const REL_PATH_TO_IMAGE_FOLDER = '/uploads/';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $filename;

/**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * Unmapped property to handle file uploads
     */
    private $file;
/**
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }
    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and target filename as params
        $this->getFile()->move(
            self::SERVER_PATH_TO_IMAGE_FOLDER,
            $this->getFile()->getClientOriginalName()
        );
        // set the path property to the filename where you've saved the file
        $this->filename = $this->getFile()->getClientOriginalName();
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }
    public function refreshUpdated()
    {
        $this->setUpdatedAt(new \DateTime());
    }
    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * @param mixed $updatedAt
     * @return Image
     */
    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Farfor", inversedBy="images")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $post2;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @param mixed $filename
     * @return Image
     */
    public function setFilename(string $filename): self
    {
        $this->filename = $filename;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }


    public function getPost2(): ?Farfor
    {
        return $this->post2;
    }

    public function setPost2(?Farfor $post2): self
    {
        $this->post2 = $post2;

        return $this;
    }

public function __toString()
    {
	      return $this->getFilename();
}
    /**
     * @return string
     */
    public function getUrl(): string
    {
        return self::REL_PATH_TO_IMAGE_FOLDER . $this->filename;
    }
}

