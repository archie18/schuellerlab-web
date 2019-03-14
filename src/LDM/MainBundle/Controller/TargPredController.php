<?php

namespace LDM\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LDM\MainBundle\Form\TargPredType;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Process;

/**
 * @Route("/targpred")
 */
class TargPredController extends Controller
{

    /**
     * @Route("/", name="ldm_targpred")
     * @Template
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(new TargPredType(), array('mode' => 1), array());

        if ('POST' == $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                //$workDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/public/dr_sasa');
                $workDir = $this->get('kernel')->getRootDir() . '/../web/targpred';
                // Create a temporary directory
                {
                    $tmpDir = tempnam($workDir, '');
                    unlink($tmpDir);
                } while (!mkdir($tmpDir));

                // Move uploaded file
                //$file = $form->get('molecule')->getData();
                $file = $form['molecule']->getData();
                $ext = $file->getClientOriginalExtension();
                $moleculeName = $this->moleculeNamePrefix . '.' . $ext;
                $file->move($tmpDir, $moleculeName);
                $moleculePath = $tmpDir . '/' . $moleculeName;

                // Run Targpred's pipeline
                $binDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/bin');
                $bash = $this->container->getParameter('dr_sasa.bash');
                $newDescfp = $this->container->getParameter('targpred_newDescfp');
                $tanmat2 = $this->container->getParameter('targpred_tanmat2');
                $chembl24 = $this->container->getParameter('Chembl24_goldStd3_max.txt.smi.fpt.bin');

                // Run process
                $process = new Process(implode(' ', array($bash, $newDescfp, '&')));
                $process->setWorkingDirectory($tmpDir);
                $process->start(); // Run in background

               
                

                // executes after the command finishes
                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }

                echo $process->getOutput();


                // Sleep for a second, then check whether the job has terminated already, which is likely due to an error
                sleep(1);


                // An error occurred
                $this->get('session')->getFlashBag()->add('error-notice', 'Error running TargPred: '.$process->getErrorOutput().'. Please contact the site administrator.');
            }

        }
        return array(
            'form' => $form->createView()
        );
    }
    

}
