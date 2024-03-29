<?php

namespace LDM\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\HttpFoundation\Response;
use LDM\MainBundle\Entity\Search;
use LDM\MainBundle\Form\SearchType;

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

    /**
     * @Route("/ipre", name="ldm_ipre")
     * @Template("@LDMMain/Default/ipre.html.twig")
     */
    public function ipreAction()
    {
        $search = new Search();
        $form = $this->createForm(new SearchType(), $search);
        $formCopy = $this->createForm(new SearchType(), $search);

        $request = $this->get('request');
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST')
        {
            if ($form->isValid())
            {
                $compound = $form->get('compound')->getData();
                $target = $form->get('target')->getData();
                $similarity = $form->get('similarity')->getData();
                $pubmed = $form->get('pubmed')->getData();
                $pmc = $form->get('pmc')->getData();
                $iter = $form->get('iter')->getData();
                $id = $form->get('id')->getData();

                if ($iter == ""){
                    $numberIter = "1";
                } else {
                    $numberIter = $iter;
                }

                if ($numberIter == "1"){
                    $command_generate_data = "python3 ../src/LDM/MainBundle/mr_toto/func_threading.py -c '".$compound."' -t '".$target."' -s ".$similarity." -i '".$id."'";
                    $python_data = shell_exec($command_generate_data);
                }              
                
                $command = "python3 ../src/LDM/MainBundle/mr_toto/main.py -m '".$numberIter."' -c '".$compound."' -t '".$target."' -s ".$similarity." -d '".$pubmed.$pmc."' -i '".$id."'";
                $python = shell_exec($command);
                
                $myfile = fopen("../src/LDM/MainBundle/mr_toto/docs/res_".$id.".txt", "r") or die("Unable to open file!");
                $response = fgets($myfile);
                fclose($myfile);
                
                $formCopy->get('compound')->setData($compound);
                $formCopy->get('target')->setData($target);
                $formCopy->get('similarity')->setData($similarity);
                $formCopy->get('pubmed')->setData($pubmed);
                $formCopy->get('pmc')->setData($pmc);
                $formCopy->get('iter')->setData($python);
                $formCopy->get('id')->setData($id);
              
                return $this->render('LDMMainBundle:Default:ipre.html.twig', array('form'=>$formCopy->createView(), 'resp'=>$response, 'button'=>$python));
            }
            return $this->render('LDMMainBundle:Default:ipre.html.twig', array('form'=>$form->createView(), 'resp'=>'', 'button'=>'0'));    
        }
        
        return $this->render('LDMMainBundle:Default:ipre.html.twig', array('form'=>$form->createView(), 'resp' => '', 'button'=>'0'));

    }


}
