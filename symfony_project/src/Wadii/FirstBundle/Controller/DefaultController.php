<?php

namespace Wadii\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class DefaultController extends Controller
{

    public function indexAction($nom,$prenom,$age,$section)
{
//return $this->render('@App/premier.html.twig');
    return $this->render('@WadiiFirst/Default/index.html.twig',
        array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'age'=>$age,
            'section'=>$section
        ));
    //$response=new \Symfony\Component\HttpFoundation\Response('symfony....');
    //        return $response;
}
}