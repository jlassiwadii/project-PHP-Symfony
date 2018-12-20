<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TacheController extends Controller
{ /**
 * @Route("/taches", name="hometache")
 */
    public function indexAction(Request $request )
    {
        $session=$request->getSession();
        if(! $session->has('mesTaches') ) {
            $mesTaches = array(
                'lundi' => 'html5',
                'mardi' => 'php');


            $session->getFlashBag()->add('success', 'taches initialiseé avec succés');
            $session->set('mesTaches', $mesTaches);
        }
        else
        {
            $mesTaches=$session->get('mesTaches');
        }



        return $this->render('@App/Taches/index.html.twig');
    }
}
