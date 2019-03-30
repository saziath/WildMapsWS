<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class itinairaireController extends AbstractController {

    /**
     * @Route("/voyages",name="itinairaire.index")
     * @return Response
     */

    public function index():Response
    {

        return  $this->render('itinairaire/index.html.twig',[
            'current_menu' => 'itinairaire'

        ]);

    }

}