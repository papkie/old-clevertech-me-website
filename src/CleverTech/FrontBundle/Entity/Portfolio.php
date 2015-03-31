<?php

namespace CleverTech\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="CleverTech\FrontBundle\Entity\PortfolioRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Portfolio {
	
    const SERVER_PATH_TO_IMAGE_FOLDER = "img/portfolio/";

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;
    
    /**
     * @ORM\Column(name="client_name", type="string")
     */
    private $clientName;
    
    /**
     * @ORM\Column(name="client_url", type="string", nullable=true)
     */
    private $clientUrl;
    
    
    /**
     * @ORM\Column(name="filename", type="string")
     */
    private $filename;
    
    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;
    
    /**
     * @ORM\Column(name="done", type="date", nullable=true)
     */
    private $done;

    
    private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }
        $this->getFile()->move(
                Portfolio::SERVER_PATH_TO_IMAGE_FOLDER, $this->getFile()->getClientOriginalName()
        );
        $this->filename = $this->getFile()->getClientOriginalName();

        $this->setFile(null);
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function lifecycleFileUpload() {
        $this->upload();
    }

    public function refreshUpdated() {
        $this->setUpdated(new \DateTime("now"));
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Portfolio
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Portfolio
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return Portfolio
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Portfolio
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set done
     *
     * @param \DateTime $done
     * @return Portfolio
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return \DateTime 
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Portfolio
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     * @return Portfolio
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string 
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientUrl
     *
     * @param string $clientUrl
     * @return Portfolio
     */
    public function setClientUrl($clientUrl)
    {
        $this->clientUrl = $clientUrl;

        return $this;
    }

    /**
     * Get clientUrl
     *
     * @return string 
     */
    public function getClientUrl()
    {
        return $this->clientUrl;
    }
}
