<?php
/**
 * Created by PhpStorm.
 * User: artio
 * Date: 12/2/2017
 * Time: 4:42 PM
 */

namespace AppBundle\Services;

use AppBundle\Entity\Job;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Knp\Component\Pager\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller;


class EntServices
{
    /** @var \Doctrine\Common\Persistence\ObjectManager|EntityManager */
    protected $em;
    protected $paginator;

    public function __construct(Registry $doctrine, Paginator $pagin)
    {
        $this->em = $doctrine->getManager();
        $this->paginator = $pagin;

    }
    /**
     * @param Request $request
     * @param $sortBy
     * @param $className
     * @param $varName
     * @return mixed
     */
    public function applyPagination(Request $request, $sortBy)
    {
      //  $dql = "SELECT $varName FROM AppBundle:$className $varName";
//        $query = $this->em->createQuery($dql);
        $query = $this->em->getRepository(Job::class)
            ->createQueryBuilder('job')
            ->getQuery();
        $pagination = $this->paginator->paginate($query, $request->query->getInt('page', 1), 10,
            ['defaultSortFieldName' =>'job.'.$sortBy, 'defaultSortDirection' => 'asc']);
        return $pagination;

    }

}
