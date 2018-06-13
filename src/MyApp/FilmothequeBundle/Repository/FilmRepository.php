<?php
/**
 * Created by PhpStorm.
 * User: jutat
 * Date: 07/06/2018
 * Time: 16:04
 */

namespace MyApp\FilmothequeBundle\Repository;
use Doctrine\ORM\EntityRepository;


class FilmRepository extends EntityRepository

{
	public function getLikeQueryBuilder($pattern)
	{
		return $this
			->createQueryBuilder('f')
			->where('f.titre LIKE :pattern')
			->setParameter('pattern', $pattern)
			;
	}
}