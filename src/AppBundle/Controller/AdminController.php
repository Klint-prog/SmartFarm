<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    /**
     * Centro administrativo para gestão operacional da fazenda.
     */
    public function indexAction(EntityManagerInterface $em, $_route)
    {
        $farms = $em->getRepository('AppBundle:Field')->findAll();

        $stats = array(
            'farms' => count($farms),
            'areas' => $em->getRepository('AppBundle:Area')->count(array()),
            'plants' => $em->getRepository('AppBundle:Plant')->count(array()),
            'tasks' => $em->getRepository('AppBundle:Task')->count(array()),
            'devices' => $em->getRepository('AppBundle:Device')->count(array()),
            'reservoirs' => $em->getRepository('AppBundle:Reservoir')->count(array()),
        );

        return $this->render('admin/index.html.twig', array(
            'classActive' => $_route,
            'stats' => $stats,
            'farms' => $farms,
        ));
    }
}
