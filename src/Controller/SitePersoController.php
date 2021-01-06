<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitePersoController extends AbstractController
{

    /**
     * @Route("/", name="profile", methods={"GET"})
     *
     * @return Response
     */
    public function index() : Response {

        return $this->render('index/index.html.twig');


    }

    /**
     * @Route("/projets", name="projets")
     * @return Response
     */
    public function projet(): Response {
        return $this->render('index/projets.html.twig');

    }

    /**
     * @Route("/cv", name="cv")
     * @return Response
     */
    public function cv(): Response {
        return $this->render('index/cv.html.twig');

    }

}