<?php

namespace LDM\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LDM\MainBundle\Form\TargPredType;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
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
                $fs = new Filesystem();
                $ejemplo = $form['ejemplo']->getData();
                $fs->dumpFile($tmpDir . '/ejemplo.smi', $ejemplo);
                //file_put_contents($tmpDir.'/ejemplo.smi', $ejemplo,FILE_APPEND)
                //$fileSystem->dumpFile('file.smi', $ejemplo);
                
                //$ext = $file->getClientOriginalExtension();
                //$moleculeName = $this->moleculeNamePrefix . '.' . $ext;
                //$file->move($tmpDir, $moleculeName);
                //$moleculePath = $tmpDir . '/' . $moleculeName;

                // Run Targpred's pipeline
                $binDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/bin');
                $bash = $this->container->getParameter('dr_sasa.bash');
                $newDescfp = $this->container->getParameter('targpred_newDescfp');
                $tanmat2 = $this->container->getParameter('targpred_tanmat2');
                $chembl24 = $this->container->getParameter('targpred_Chembl24');
                $Chembl_Newdesc = $this->container->getParameter('targpred_Chembl_Newdesc');
                $test = $this->container->getParameter('targpred_test');
                // Run newDescfp process 
                $array = array($bash, $binDir.'/'.$newDescfp, '&');
                //$array = array($bash, $binDir.'/'.$test, '&');
                $process = new Process(implode(' ', $array));
                $process->setWorkingDirectory($tmpDir);
                $process->start(); // Run in background

                // executes after the command finishes
                //if (!$process->isSuccessful()) {
                //    throw new ProcessFailedException($process);
                //}

                //echo $process->getOutput();

                // Sleep for a second, then check whether the job has terminated already, which is likely due to an error
                sleep(1);

                // Run TargpredQuery process 
                //./tanmat2 -i Chembl24_goldStd3_max.txt.smi.fpt.bin -j example_molecule.smi.fpt.bin -o ChEMBL24desc_vs_NEWdesc_fp2.tanmat -s " "
                $array = array($bash, $binDir.'/'.$test, '&');
                //$array = array($bash, $binDir.'/'.$newDescfp, '&');
                //$array = array($binDir.'/'.$tanmat2.' -i', $binDir.'/'.$chembl24.' -j', $tmpDir.'/ejemplo.smi.fpt.bin -o', $binDir.'/'.$Chembl_Newdesc.' -s " "');
                $process2 = new Process(implode(' ', $array));
                $process2->setWorkingDirectory($tmpDir);
                $process2->start(); // Run in background
                // executes after the command finishes
//                if (!$process2->isSuccessful()) {
//                    throw new ProcessFailedException($process2);
//                }

                echo $process2->getOutput();


                // Sleep for a second, then check whether the job has terminated already, which is likely due to an error
                sleep(1);

                if (!$process2->isTerminated() or !$process2->getErrorOutput()) {
                    return $this->redirect($this->generateUrl('ldm_targpred_results', array('token' => basename($tmpDir))));
                }
                // An error occurred
                $this->get('session')->getFlashBag()->add('error-notice', 'Error running TargPred: '.$process2->getErrorOutput().'. Please contact the site administrator.');
            }

        }
        return array(
            'form' => $form->createView()
        );
    }
    /**
     * @Route("/results/{token}", name="ldm_targpred_results")
     * @Template
     * @param Request $request
     */
    public function resultsAction($token) {
        // Check whether the calculation has finished
        $fs = new Filesystem();
        $workDir = $this->get('kernel')->getRootDir() . '/../web/targpred';
        $tmpDir = $workDir . '/' . $token;
        if (!$fs->exists($tmpDir . '/DONE')) {
            return $this->render('@LDMMain/TargPred/running.html.twig', array('token' => $token));
        }

        // Calculation has finished
        $zipName = $this->zipNamePrefix . $token;
        $outDir = $tmpDir . '/' . $zipName;

        // Check zip file exists
        if (!$fileSystem->exists($tmpDir . '/' . $zipName . '.zip')) {
            $this->get('session')->getFlashBag()->add('error-notice', 'An error occurred creating the results zip file. Please contact the site administrator.');
        }

        // Read command line

        // Read output
 
        // Check there was output

    }
    /**
     * @Route("/download", name="ldm_targpred_download")
     * @Template
     */
    //public function downloadAction() {

      //  return array();
    //}
}
