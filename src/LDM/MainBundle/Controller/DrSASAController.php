<?php

namespace LDM\MainBundle\Controller;

use LDM\MainBundle\Form\DrSASAType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Process\Process;

/**
 * Controller to run dr_sasa.
 * @author Andreas Schüller
 * @Route("/dr_sasa")
 */
class DrSASAController extends Controller {

    private $zipNamePrefix = 'dr_sasa_results_';
    private $moleculeNamePrefix = 'structure';

    /**
     * @Route("/", name="ldm_dr_sasa")
     * @Template
     */
    public function indexAction(Request $request) {
        $form = $this->createForm(new DrSASAType(), array('mode' => 1), array(
            //'action' => $this->generateUrl('ldm_dr_sasa_results')
        ));

        if ('POST' == $request->getMethod()) {
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                //$workDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/public/dr_sasa');
                $workDir = $this->get('kernel')->getRootDir() . '/../web/dr_sasa';
                // Create a temporary directory
                {
                    $tmpDir = tempnam($workDir, '');
                    unlink($tmpDir);
                } while (!mkdir($tmpDir));

                // Move uploaded file
                $file = $form['molecule']->getData();
                $ext = $file->getClientOriginalExtension();
                $moleculeName = $this->moleculeNamePrefix . '.' . $ext;
                $file->move($tmpDir, $moleculeName);
                $moleculePath = $tmpDir . '/' . $moleculeName;

                // Run dr_sasa
                $binDir = $this->container->get('kernel')->locateResource('@LDMMainBundle/Resources/bin');
                $mode = $file = $form['mode']->getData();
                $drSASABinary = $this->container->getParameter('dr_sasa_binary');
                $commandLine = $binDir . '/' . $drSASABinary . ' -i ' . $moleculePath . ' -m ' . $mode;
                $zipName = $this->zipNamePrefix . basename($tmpDir);
                $process = new Process(implode(' ', array('/bin/bash', $binDir.'/dr_sasa.sh', '"'.$commandLine.'"', $zipName, '&')));
                $process->setWorkingDirectory($tmpDir);
                $process->start(); // Run in background

                // Sleep for a second, then check whether the job has terminated already, which is likely due to an error
                sleep(1);

                if (!$process->isTerminated() or !$process->getErrorOutput()) {
                    return $this->redirect($this->generateUrl('ldm_dr_sasa_results', array('token' => basename($tmpDir))));
                }

                // An error occurred
                $this->get('session')->getFlashBag()->add('error-notice', 'Error running dr_sasa: '.$process->getErrorOutput().'. Please contact the site administrator.');
            }

        }

        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/results/{token}", name="ldm_dr_sasa_results")
     * @Template
     * @param Request $request
     */
    public function resultsAction($token) {
        // Check whether the calculation has finished
        $fileSystem = new Filesystem();
        $workDir = $this->get('kernel')->getRootDir() . '/../web/dr_sasa';
        $tmpDir = $workDir . '/' . $token;
        if (!$fileSystem->exists($tmpDir . '/DONE')) {
            return $this->render('@LDMMain/DrSASA/running.html.twig', array('token' => $token));
        }

        // Calculation has finished
        $zipName = $this->zipNamePrefix . $token;
        $outDir = $tmpDir . '/' . $zipName;

        // Check zip file exists
        if (!$fileSystem->exists($tmpDir . '/' . $zipName . '.zip')) {
            $this->get('session')->getFlashBag()->add('error-notice', 'An error occurred creating the results zip file. Please contact the site administrator.');
        }

        // Read command line
        $finder = new Finder();
        $finder->files()->name('command_line');
        $commandLine = '';
        foreach ($finder->in($outDir) as $file) {
            $commandLine .= $file->getContents();
        }

        // Read output
        $finder = new Finder();
        $finder->files()->name( 'out');
        $output = '';
        foreach ($finder->in($outDir) as $file) {
            $output .= $file->getContents();
        }

        // Check there was output
        if (!$output) {
            $this->get('session')->getFlashBag()->add('error-notice', 'Error running dr_sasa. Please check the errors/warnings below and contact the site administrator.');
        }

        // Read error
        $finder = new Finder();
        $finder->files()->name('err');
        $errorOutput = '';
        foreach ($finder->in($outDir) as $file) {
            $errorOutput .= $file->getContents();
        }

        return array (
            'token' => $token,
//            'zipName' => $zipName,
            'zipFileName' => $zipName . '.zip',
            'commandLine' => $commandLine,
            'output' => $output,
            'errorOutput' => $errorOutput,

        );
    }

    /**
     * @Route("/download", name="ldm_dr_sasa_download")
     * @Template
     */
    public function downloadAction() {

        return array();
    }

}
