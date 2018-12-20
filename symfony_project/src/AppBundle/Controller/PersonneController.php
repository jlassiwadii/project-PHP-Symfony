<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use AppBundle\Entity\Personne;
class PersonneController extends Controller
{
    /**
     * @Route("/list" ,name="list")
     */
    public function listAction()
    {
        $doctrine=$this->getDoctrine();
        $repository=$doctrine->getRepository('AppBundle:Personne');
         $personnes=$repository->findAll();
        //$personnes=$repository->getPersonneByAgeInterval(5, 10);

        return $this->render('@App/Personne/list.html.twig', array('personnes'=>$personnes));
    }
//,
    /**
     * @Route("/added/{nom}/{prenom}/{age}/{path}",name="added",
     *  defaults={"path":"images/002.jpg"},
     *  requirements={"age":"\d{2}",
     *     "path": ".*\.jpg|.jpeg|.png$"})
     */
    public function addAction($nom,$prenom,$age,$path)
    {
        $newpath ='images/'. $path;

        $personne=new Personne($nom,$prenom,$age,$newpath);


       $entite=$this->getDoctrine()->getManager();

       $entite->persist($personne);

       $entite->flush();
        return $this->forward('AppBundle:Personne:list');
    }

    /**
     * @Route("/update/{id}" , name="update")
     */
    public function updateAction(Request $request, $id,Personne $personne = null)
    {
        $session = $request->getSession();
        if ($personne->getId()) {
            if ($personne->getPath()) {

                $personne->setPath("004.jpg" );
                $entite = $this->getDoctrine()->getManager();

                $entite->persist($personne);

                $entite->flush();
            } else {
                $session->getFlashBag()->add('error', 'rien passer');
            }

        }else{
            $session->getFlashBag()->add('error', 'personne n\'existe plus');
        }


        return $this->forward('AppBundle:Personne:list');
    }

    /**
     * @Route("/delete/{personne}",name="delete")
     */
    public function deleteAction(Request $request, Personne $personne = null)
    {


        $session = $request->getSession();
        if (!$personne) {
            $session->getFlashBag()->add('error', 'personne inexistant');
        } else {

            $entite = $this->getDoctrine()->getManager();

            $entite->remove($personne);

            $entite->flush();
        }


        return $this->forward('AppBundle:Personne:list');


    }
    /**
     * @Route("/insert",name="insert")
     */
    public function insertAction()
    {
        $personnes=array(new Personne('morad','jaleli',15,'images/001.jpg'),
            new Personne('saleh','marnissi',75,'images/001.jpg'));
        $entite=$this->getDoctrine()->getManager();
        foreach($personnes as $personne)
        {
            $entite->persist($personne);
        }
        $entite->flush();
        return $this->forward('AppBundle:Personne:list');
    }

}
