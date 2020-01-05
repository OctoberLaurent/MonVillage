<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('default/index.html.twig', []);
    }

    /**
     * @Route("/public", name="public")
     */
    public function public()
    {
        return $this->render('default/public.html.twig', []);
    }

    /**
     * @Route("/private", name="private")
     */
    public function private()
    {
        return $this->render('default/private.html.twig', [
            
        ]);
    }

    /**
     * @Route("/send", name="send")
     */
    public function send(\Swift_Mailer $mailer){
        
        $message = (new \Swift_Message('Hello Email'))
        ->setFrom('send@example.com')
        ->setTo('laurent@lepl.at')
        ->setBody(
            $this->renderView(
                // templates/emails/registration.html.twig
                'emails/registration.html.twig'
            ),
            'text/html'
        )

        // you can remove the following code if you don't define a text version for your emails
        ->addPart(
            $this->renderView(
                // templates/emails/registration.txt.twig
                'emails/registration.txt.twig'
            ),
            'text/plain'
        )
    ;

    $mailer->send($message);

    return $this->render('default/send.html.twig', [
            
        ]);

    }

}
