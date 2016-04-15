<?php

namespace Vins\Platform\Bundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CartRepository extends EntityRepository
{
	public function getOneCartWithAllInformations($id)
	{
		$qb = $this->createQueryBuilder('c')
				   ->where('c.id = :id')
				   ->setParameter('id', $id)
				   ->leftJoin('c.cartLines', 'cl')
				   ->addSelect('cl')
		;
		  return $qb
	    ->getQuery()
	    ->getSingleResult()
	  ;
	}
}


