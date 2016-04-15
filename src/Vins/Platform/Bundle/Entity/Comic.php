<?php

namespace Vins\Platform\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vins\Platform\Bundle\Entity\ComicRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comic
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Vins\Platform\Bundle\Entity\Category" ,  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */

    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="Vins\Platform\Bundle\Entity\ArtistComic", mappedBy="comic", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $artistComics;

    /**
     * @ORM\OneToOne(targetEntity="Vins\Platform\Bundle\Entity\Image" ,cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    
    /**
     * @ORM\OneToMany(targetEntity="Vins\Platform\Bundle\Entity\CartLine", mappedBy="comic", cascade={"persist", "remove"})
     **/ 
    private $cartLines;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="datetime")
     */
    private $updateDate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank(message="Le champs format est vide")
     * @Assert\Length(min=3, minMessage="Le titre doit comprendre au min 4 caracteres.", 
     *                max=50, maxMessage="Le titre doit comprendre au max 50 caracteres.")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     * @Assert\NotBlank(message="Le champs format est vide")
     * @Assert\Length(min=4, minMessage="Le format doit comprendre au min 4 caracteres.", 
     *                  max=25, maxMessage="Le format doit comprendre au max 25 caracteres.")
     */
    private $format;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal")
     * @Assert\Range(min=3.99, max=50, minMessage="Le prix doit etre superieur a 3.99", 
     *              maxMessage="le prix doit etre inferieur a 50", 
     *              invalidMessage="le champ prix doit etre un nombre")
     */
    private $price;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publicationDate", type="date")
     */
    private $publicationDate;

     /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="string", length=255)
     * @Assert\Range(min=0, minMessage="Le champs stock doit etre >= 0.", 
     *                invalidMessage="Le champs stock doit etre de type entier")
     */
    private $stock;

    /**
     * @var integer
     *
     * @ORM\Column(name="summary", type="text")
     *
     */
    private $summary;




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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Comic
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Comic
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Comic
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set format
     *
     * @param string $format
     * @return Comic
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Comic
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set publicationDate
     *
     * @param \DateTime $publicationDate
     * @return Comic
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    /**
     * Get publicationDate
     *
     * @return \DateTime 
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->artistComics = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creationDate= new \DateTime();
        $this->updateDate = new \DateTime();
    }



   

   

    /**
     * Set image
     *
     * @param \Vins\Platform\Bundle\Entity\Image $image
     * @return Comic
     */
    public function setImage(\Vins\Platform\Bundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Vins\Platform\Bundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * Add artistComics
     *
     * @param \Vins\Platform\Bundle\Entity\ArtistComic $artistComics
     * @return Comic
     */
    public function addArtistComic(\Vins\Platform\Bundle\Entity\ArtistComic $ac)
    {
        $this->artistComics[] = $ac;
        $ac->setComic($this);
        return $this;
    }

    /**
     * Remove artistComics
     *
     * @param \Vins\Platform\Bundle\Entity\ArtistComic $artistComics
     */
    public function removeArtistComic(\Vins\Platform\Bundle\Entity\ArtistComic $artistComics)
    {
        $this->artistComics->removeElement($artistComics);
    }

    /**
     * Get artistComics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArtistComics()
    {
        return $this->artistComics;
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->updateDate= new \DateTime();
    }



   


  

    /**
     * Set stock
     *
     * @param string $stock
     * @return Comic
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return string 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Add cartLines
     *
     * @param \Vins\Platform\Bundle\Entity\CartLine $cartLines
     * @return Comic
     */
    public function addCartLine(\Vins\Platform\Bundle\Entity\CartLine $cartLines)
    {
        $this->cartLines[] = $cartLines;
        $cartLines->setComic($this);
        return $this;
    }

    /**
     * Remove cartLines
     *
     * @param \Vins\Platform\Bundle\Entity\CartLine $cartLines
     */
    public function removeCartLine(\Vins\Platform\Bundle\Entity\CartLine $cartLines)
    {
        $this->cartLines->removeElement($cartLines);
    }

    /**
     * Get cartLines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCartLines()
    {
        return $this->cartLines;
    }

    /**
     * Add categories
     *
     * @param \Vins\Platform\Bundle\Entity\Category $categories
     * @return Comic
     */
    public function addCategory(\Vins\Platform\Bundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Vins\Platform\Bundle\Entity\Category $categories
     */
    public function removeCategory(\Vins\Platform\Bundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Comic
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }
}
