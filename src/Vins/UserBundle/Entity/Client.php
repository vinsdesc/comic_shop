<?php

namespace Vins\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Client
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Vins\UserBundle\Entity\ClientRepository")
 */
class Client extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Vins\UserBundle\Entity\Address" ,  cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresses;


    /**
     * @var integer
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstname;





    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


  
    public function __construct()
    {
        parent::__construct();
        $this->adresses= new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add adresses
     *
     * @param \Vins\UserBundle\Entity\Address $adresses
     * @return Client
     */
    public function addAdress(\Vins\UserBundle\Entity\Address $adresses)
    {
        $this->adresses[] = $adresses;
        return $this;
    }

    /**
     * Remove adresses
     *
     * @param \Vins\UserBundle\Entity\Address $adresses
     */
    public function removeAdress(\Vins\UserBundle\Entity\Address $adresses)
    {
        $this->adresses->removeElement($adresses);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
  

    /**
     * Set name
     *
     * @param string $name
     * @return Client
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
     * Set firstname
     *
     * @param string $firstname
     * @return Client
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
}
