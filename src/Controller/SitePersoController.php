<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitePersoController extends AbstractController
{



    /**
     * @Route("/", name="profil", methods={"GET"})
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

    /**
     * @Route("/contacter", name="contacter")
     * @param Request $request
     * @param \Swift_Mailer $mailer
     *
     */

    public function contacter(Request $request, \Swift_Mailer $mailer)
    {

        $ctct = new Contact();


        $form = $this->createForm(ContactType::class, $ctct);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($ctct);
            $em->flush();

            $contact = $form->getData();
            $message = (new \Swift_Message('Nouveau contact'))
                ->setFrom('emailtest@gmail.com')

                ->setTo('zeqostream@gmail.com')

                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig', compact('contact')
                    ),
                    'text/html'
                )
            ;
            $mailer->send($message);

            return $this->redirectToRoute('profil');
        }

        return $this->render('index/contacter.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }

}