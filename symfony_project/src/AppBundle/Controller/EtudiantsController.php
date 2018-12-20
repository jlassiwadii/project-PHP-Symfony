<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Etudiants;
use AppBundle\Form\EtudiantsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class EtudiantsController
 * @package AppBundle\Controller
 * @Route("/etudiants",name="etudiants")
 */
class EtudiantsController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/add",name="add_Etudiants")
     */
    public function indexAction()
    {
        $etudiante=new Etudiants();
        $form=$this->createForm(EtudiantsType::class,$etudiante);
        return $this->render('@App/etudiants/etudiants.html.twig', array('form' => $form->CreateView()));
    }
}
