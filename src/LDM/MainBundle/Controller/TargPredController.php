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
                $query = $form['smiles']->getData();
                $fs->dumpFile($tmpDir . '/query.smi', $query);
                //file_put_contents($tmpDir.'/ejemplo.smi', $ejemplo,FILE_APPEND)
                //$fileSystem->dumpFile('file.smi', $ejemplo);
                

                // Run Targpred's pipeline
                $binDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/bin');
                $bash = $this->container->getParameter('dr_sasa.bash');
                $newDescfp = $this->container->getParameter('targpred_newDescfp');
                $tanmat2 = $this->container->getParameter('targpred_tanmat2');
                $chembl24 = $this->container->getParameter('targpred_Chembl24');
                $Chembl_Newdesc = $this->container->getParameter('targpred_Chembl_Newdesc');
                $test = $this->container->getParameter('targpred_test');
                $targetpredquery = $this->container->getParameter('targpred_query');
                $chembl24_co = $this->container->getParameter('targpred_Chembl24_co');
                $query_co = $this->container->getParameter('targpred_query_co');
                $babel = $this->container->getParameter('targpred_babel');
                // Run newDescfp process 
                $array = array($bash, $binDir.'/'.$newDescfp, $binDir.'/'.$tanmat2, $binDir.'/'.$chembl24, $binDir.'/'.$targetpredquery, $binDir.'/'.$chembl24_co, $binDir.'/'.$query_co, $babel, '&');
                //$array = array($bash, $binDir.'/'.$test, '&');
                $process = new Process(implode(' ', $array));
                $process->setWorkingDirectory($tmpDir);
                $process->start(); // Run in background

             
                sleep(1);

                if (!$process->isTerminated() or !$process->getErrorOutput()) {
                    return $this->redirect($this->generateUrl('ldm_targpred_results', array('token' => basename($tmpDir))));
                }
                // An error occurred
                $this->get('session')->getFlashBag()->add('error-notice', 'Error running TargPred: '.$process->getErrorOutput().'. Please contact the site administrator.');
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
        $fileSystem = new Filesystem();
        $workDir = $this->get('kernel')->getRootDir() . '/../web/targpred';
        $tmpDir = $workDir . '/' . $token;
        if (!$fileSystem->exists($tmpDir . '/DONE')) {
            return $this->render('@LDMMain/TargPred/running.html.twig', array('token' => $token));
        }

        // Calculation has finished
        $predName = 'predictions.out'; //$this->zipNamePrefix . $token;
        $outDir = $tmpDir; // . '/' . $zipName;

        // Check zip file exists
        if (!$fileSystem->exists($tmpDir . '/' . $predName )) {
            $this->get('session')->getFlashBag()->add('error-notice', 'The file with the predictions was not found. Please contact the site administrator.');
        }

        // Read command line

        // Read output
        $finder = new Finder();
        $finder->files()->name( 'predictions.out');
        $output = '';
        foreach ($finder->in($outDir) as $file) {
            $output .= $file->getContents();
        }

        // Check there was output
        if (!$output) {
            $this->get('session')->getFlashBag()->add('error-notice', 'Error running dr_sasa. Please check the errors/warnings below and contact the site administrator.');
        }

        // Read SMILES
        $finder = new Finder();
        $finder->files()->name( 'query.smi');
        $query = '';
        foreach ($finder->in($outDir) as $file) {
            $query .= $file->getContents();
        }

        // Read interactions file
        $finder = new Finder();
        $binDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/bin');
        $intFileName = $this->container->getParameter('targpred_Chembl24_co');
        $finder->files()->name($intFileName);
        $ints = '';
        foreach ($finder->in($binDir) as $file) {
            $ints .= $file->getContents();
        }

        // Parse ints file
        $lines = explode("\n", $ints);
        $targetLookup = array();
        foreach ($lines as $line) {
            if ($line) {
                $parts = explode("\t", $line);
                $targetLookup[$parts[0]] = $parts[3];
            }
        }

        // Parse results
        $lines = explode("\n", $output);
        $results = array();
        foreach ($lines as $line) {
            if ($line) {
                $parts = explode("\t", $line);
                $results[] = array($parts[2], $parts[3], $parts[5]);
            }
        }

        return array (
            'token' => $token,
//            'zipName' => $zipName,
//            'zipFileName' => $zipName . '.zip',
//            'commandLine' => $commandLine,
            'results' => $results,
            'query' => $query,
            'targetLookup' => $targetLookup,
//            'errorOutput' => $errorOutput,
//            'contactPlotFilenames' => $contactPlotFilenames,
//            'contactPlotTitles' => $contactPlotTitles,
        );

    }
    /**
     * @Route("/download", name="ldm_targpred_download")
     * @Template
     */
    //public function downloadAction() {

      //  return array();
    //}
}
