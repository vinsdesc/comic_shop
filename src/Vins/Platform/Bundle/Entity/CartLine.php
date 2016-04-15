<?php

namespace Vins\Platform\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartLine
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CartLine
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
     * @ORM\ManyToOne(targetEntity="Vins\Platform\Bundle\Entity\Cart", inversedBy="cartLines")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cart;
    
    /**
     * @ORM\ManyToOne(targetEntity="Vins\Platform\Bundle\Entity\Comic", inversedBy="cartLines", cascade={"persist"})
     **/ 
    private $comic;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;


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
     * Set quantity
     *
     * @param integer $quantity
     * @return CartLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set available
     *
     * @param boolean $available
     * @return CartLine
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean 
     */
    public function getAvailable()
    {
        return $this->available;
    }
   

    /**
     * Set cart
     *
     * @param \Vins\Platform\Bundle\Entity\Cart $cart
     * @return CartLine
     */
    public function setCart(\Vins\Platform\Bundle\Entity\Cart $cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Vins\Platform\Bundle\Entity\Cart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set comic
     *
     * @param \Vins\Platform\Bundle\Entity\Comic $comic
     * @return CartLine
     */
    public function setComic(\Vins\Platform\Bundle\Entity\Comic $comic = null)
    {
        $this->comic = $comic;

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
}
