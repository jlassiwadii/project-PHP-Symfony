<?php

namespace AppBundle\Controller;

use Wadii\FirstBundle\Entite\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle;
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //$session=$request->getSession();
       // $variable=$session->get('variable');
       // if(isset ($variable))
          //  echo 'ma session est deja ouverte mon varaible est '.$variable;
       // else
           /// echo " j\'ai recupèr monvariable";
       // $s/ession->set('variable','jlassi');


             //echo $this->generateUrl('homepage');
        // replace this example code with whatever you need
         return $this->render('default/index.html.twig');

    }

    public function addAction(Request $request,$name,$number)
    {
        $session=$request->getSession();

    if(!$session->has('todo'))
    {$session->getFlashBag()->add('error','Session inexistant');
    }
    else {
        $todo = $session->get('todo');
        if (isset ($todo[$name])) {
            $session->getFlashBag()->add('error', 'La personne existe deja');
        } else {
            $todo[$name] = $number;

            $session->set('todo', $todo);
            $session->getFlashBag()->add('success', 'La personne a été ajouté');
        }
    }}
// la deuxieme checkpoint de controlleur-----------------------//
    /**
     * @Route("/cv/{nom}/{prenom}/{age}/{section}", name="premier")
     */
    public function premierAction($nom,$prenom,$age,$section)
    {
//return $this->render('@App/premier.html.twig');
        return $this->render('@App/cv.html.twig',
            array(
                'nom'=>$nom,
                'prenom'=>$prenom,
                'age'=>$age,
                'section'=>$section
            ));
        //$response=new \Symfony\Component\HttpFoundation\Response('symfony....');
        //        return $response;
    }
    /**
     * @Route("/heritage", name="heritage")
     */
    public function heritageAction()
    {

        return $this->render('@App/heritage.html.twig');
    }

    /**
     * @Route("/cvs", name="show")
     */
    public function showAction()
    {
        $personne_1=new Personne('wadii','jlassi',30,'images/001.jpg');
     $personne_2=new Personne('mohamed','jlassi',50,'images/002.jpg');
     $personne_3=new Personne('wadid','idadi',40,'images/003.jpg');
     $personnes=array();
   array_push($personnes, $personne_1);
 array_push($personnes, $personne_2);
  array_push($personnes, $personne_3);


        return $this->render('@App/cvs.twig.html.twig',array(
            'personnes'=>$personnes));


    }
}
