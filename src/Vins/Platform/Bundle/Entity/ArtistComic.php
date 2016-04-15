<?php

namespace Vins\Platform\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtistComic
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vins\Platform\Bundle\Entity\ArtistComicRepository")
 */
class ArtistComic
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
     * @ORM\Column(name="job", type="string", length=255)
     */
    private $job;



    /**
     * @ORM\ManyToOne(targetEntity="Vins\Platform\Bundle\Entity\Comic", inversedBy="artistComics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $comic;

    /**
     * @ORM\ManyToOne(targetEntity="Vins\Platform\Bundle\Entity\Artist" , cascade={"persist"} ,inversedBy="artistComics")
     * @ORM\JoinColumn(nullable=false)
     */ 
    private $artist;



   


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
     * Set job
     *
     * @param string $job
     * @return ArtistComic
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }





    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set comic
     *
     * @param \Vins\Platform\Bundle\Entity\Comic $comic
     * @return ArtistComic
     */
    public function setComic(\Vins\Platform\Bundle\Entity\Comic $com = null)
    {
        $this->comic = $com;
        return $this;
    }

    /**
     * Get comic
     *
     * @return \Vins\Platform\Bundle\Entity\Comic 
     */
    public function getComic()
    {
        return $this->comic;
    }

    /**
     * Set artist
     *
     * @param \Vins\Platform\Bundle\Entity\Artist $artist
     * @return ArtistComic
     */
    public function setArtist(\Vins\Platform\Bundle\Entity\Artist $art = null)
    {

        $this->artist = $art;
        return $this;
    }

    /**
     * Get artist
     *
     * @return \Vins\Platform\Bundle\Entity\Artist 
     */
    public function getArtist()
    {
        return $this->artist;
    }


   
}
