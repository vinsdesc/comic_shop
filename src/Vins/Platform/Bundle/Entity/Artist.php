<?php

namespace Vins\Platform\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Artist
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="biography", type="text")
     */
    private $biography;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date")
     */
    private $birthDate;

    /**
     * @ORM\OneToMany(targetEntity="Vins\Platform\Bundle\Entity\ArtistComic", mappedBy="artist", cascade={"persist"})
     */
    private $artistComics;


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
     * @return Artist
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
     * Set firstName
     *
     * @param string $firstName
     * @return Artist
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set biography
     *
     * @param string $biography
     * @return Artist
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
     * Get biography
     *
     * @return string 
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Artist
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artistComics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artistComics
     *
     * @param \Vins\Platform\Bundle\Entity\ArtistComic $artistComics
     * @return Artist
     */
    public function addArtistComic(\Vins\Platform\Bundle\Entity\ArtistComic $ac)
    {
        $this->artistComics[] = $ac;
        $ac->addArtist($this);
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


    public function __toString()
    {
        return $this->name." ".$this->firstName;


    }
}
