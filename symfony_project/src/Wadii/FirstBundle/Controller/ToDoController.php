<?php

namespace Wadii\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ToDoController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('mesTaches')) {
            $mesTaches = array();


            $session->getFlashBag()->add('success', 'taches initialiseé avec succés');
            $session->set('mesTaches', $mesTaches);
        } else {
            $mesTaches = $session->get('mesTaches');
        }


        return $this->render('@WadiiFirst/Default/listeToDo.html.twig');
    }

////add
    public function addAction(Request $request, $name, $number)
    {
        $session = $request->getSession();

        if (!$session->has('mesTaches')) {
            $session->getFlashBag()->add('error', 'Session inexistant');
        } else {
            $mesTaches = $session->get('mesTaches');
            if (isset ($mesTaches[$name])) {
                $session->getFlashBag()->add('error', 'La personne existe deja');
            } else {
                $mesTaches[$name] = $number;

                $session->set('mesTaches', $mesTaches);
                $session->getFlashBag()->add('success', 'La personne a été ajouté');

            }
        }
        return $this->forward('WadiiFirstBundle:ToDo:index');
    }

    //mise à jour
    public function updateAction(Request $request, $name, $contenu)
    {
        $session = $request->getSession();

        if (!$session->has('mesTaches')) {
            $session->getFlashBag()->add('error', 'Session inexistant');
        } else {
            $mesTaches = $session->get('mesTaches');
            if (isset ($mesTaches[$name])) {
                $session->getFlashBag()->add('succcess', 'La personne existe ');
                $mesTaches[$name] = $contenu;
            }
            $session->set('mesTaches', $mesTaches);
            $session->getFlashBag()->add('success', 'La personne est modifié');

        }

        return $this->forward('WadiiFirstBundle:ToDo:index');
    }

// delete
    public function deleteAction(Request $request, $name, $number)
    {
        $session = $request->getSession();

        if (!$session->has('mesTaches')) {
            $session->getFlashBag()->add('error', 'Session inexistant');
        } else {
            $mesTaches = $session->get('mesTaches');
            if (isset ($mesTaches[$name])) {
                $session->getFlashBag()->add('succcess', 'La personne existe ');
                unset ($mesTaches[$name]);
            }
            $session->set('mesTaches', $mesTaches);
            $session->getFlashBag()->add('success', 'La personne a été supprimé');

        }

        return $this->forward('WadiiFirstBundle:ToDo:index');
    }

    //reset

    public function resetAction(Request $request)
    {
        $session = $request->getSession();
        if ($session->has('mesTaches')) {
            $session->getFlashBag()->add('success', 'Session existant');
            $session->clear();
            $session->getFlashBag()->add('success', 'La session a été rénitialisé');

            return $this->forward('WadiiFirstBundle:ToDo:index');
        }

    }
}









