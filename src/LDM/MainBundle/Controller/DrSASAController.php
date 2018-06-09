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
     * @Route("/workshop201804", name="ldm_workshop201804")
     * @Template()
     */
    public function workshop201804Action()
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
                    'title' => 'Assistant Professor',
                    'description' => 'Group Leader',
                    'picture' => 'andreas2.png',
                    'contact' => 'aschueller@bio.puc.cl'
                ),
//                array(
//                    'name' => 'Jorge Cares',
//                    'title' => 'Bioinformatic engineer',
//                    'description' => 'Software Developer',
//                    'picture' => 'jorge.JPG',
//                    'contact' => 'aschuller@bio.puc.cl'
//                ),
//                array(
//                    'name' => 'Felipe Rodríguez',
//                    'title' => 'Bioinformatic engineer',
//                    'description' => 'Software Developer',
//                    'picture' => 'jorge.JPG',
//                    'contact' => 'aschuller@bio.puc.cl'
//                ),
                array(
                    'name' => 'Daniela Herrera',
                    'title' => 'PhDc Engineering sciences',
                    'description' => 'PhD Thesis: "Protein engineering of resveratrol O-methyltransferase for the production of stilbenes"<br />Comparative protein structure modeling. Molecular docking. Molecular dynamics simulations.',
                    'picture' => 'dani.jpeg',
                    'contact' => 'dpherrer@uc.cl'
                ),
                array(
                    'name' => 'Mauricio Ruiz',
                    'title' => 'Bioinformatic engineer',
                    'description' => 'Lab Manager<br/>Project: "In silico target prediction based on small molecules chemical similarity."',
                    'picture' => 'mauricio.jpeg',
                    'contact' => 'ruiz.moraga.90@gmail.com'
                ),
                array(
                    'name' => 'Claudio Ponce Acosta',
                    'title' => 'Biochemistry undergraduate student',
                    'description' => 'Undergraduate Thesis: "Detection of protein-ligand binding site residues by a physicochemical and spatial uniqueness approach"',
                    'picture' => 'claudio2.png',
                    'contact' => 'caponce@uc.cl'
                ),
                array(
                    'name' => 'Carlos Vigil Vásquez',
                    'title' => 'Biochemistry undergraduate student',
                    'description' => 'Project: "In silico prediction and prioritization of new biological target for drugs"',
                    'picture' => 'carlos2.png',
                    'contact' => 'cvigil2@uc.cl'
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
