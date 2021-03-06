<?php

namespace ad\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
	/**
	 * Find all user sorted with knp_paginator
	 *
	 * @return array(user)
	 */
	public function findAllSorted()
	{
		$em = $this->getEntityManager();
	
		$qb = $em->createQueryBuilder();
		$qb->addSelect('u');
		$qb->from('adUserBundle:User','u');
		
		if (!empty($_GET['sort']))
		{
			$qb->orderBy($_GET['sort'], $_GET['direction']);	//knp_paginator sort
		}
		else
		{
			$qb->orderBy('u.username',  $order = 'DESC');
		}
	
		return $response = $qb->getQuery()->getResult();
	}
	
	
	
	
}
