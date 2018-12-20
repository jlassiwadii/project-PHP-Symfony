<?php

namespace Wadii\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class RouterController extends Controller
{
    public function indexAction($nom,$prenom,$age,$section,$langue,$format)
    {

        return $this->render('@WadiiFirst/Default/chemin.html.twig',
            array(
                'nom' => $nom,
                'prenom' => $prenom,
                'age' => $age,
                'section' => $section,
                'langue' => $langue,
                'format'=>$format
            ));
    }
}
