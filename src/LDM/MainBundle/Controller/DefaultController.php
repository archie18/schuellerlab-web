<?php

namespace LDM\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="ldm_home")
     * @Template("@LDMMain/Default/index.html.twig")
     */
    public function indexAction()
    {

        return array(
            'text' => "Hola mundo"
        );
    }

    /**
     * @Route("/workshop04218", name="ldm_workshop042018")
     * @Template("@LDMMain/Default/workshop042018.html.twig")
     */
    public function workshop042018Action()
    {

        return array(
            'text' => "Hola mundo"
        );
    }

    /**
     * @Route("/members", name="ldm_members")
     * @Template("@LDMMain/Default/members.html.twig")
     */
    public function membersAction()
    {

        return array(
            'members' => array(
                array(
                    'name' => 'Andreas Schueller',
                    'title' => 'Boss',
                    'description' => 'LALA',
                    'picture' => 'andreas2.png',
                    'contact' => 'aschueller@bio.puc.cl'
                ),
                array(
                    'name' => 'Jorge Cares',
                    'title' => 'Ingeniero en Bioinformática',
                    'description' => 'LALA',
                    'picture' => 'jorge.JPG',
                    'contact' => 'aschuller@bio.puc.cl'
                ),
                array(
                    'name' => 'Daniela Herrera',
                    'title' => 'Alumna doctorado',
                    'description' => 'LALA',
                    'picture' => 'dani.jpeg',
                    'contact' => 'aschuller@bio.puc.cl'
                ),
                array(
                    'name' => 'Mauricio Herrera',
                    'title' => 'Ingeniero en Bioinformática',
                    'description' => 'LALA',
                    'picture' => 'mauricio.jpeg',
                    'contact' => 'ruiz.moraga.90@gmail.com'
                ),

            )
        );
    }

    /**
     * @Route("/contact", name="ldm_contact")
     * @Template("@LDMMain/Default/contact.html.twig")
     */
    public function contactAction()
    {

        return array(
            'text' => "Hola mundo"
        );
    }
}
