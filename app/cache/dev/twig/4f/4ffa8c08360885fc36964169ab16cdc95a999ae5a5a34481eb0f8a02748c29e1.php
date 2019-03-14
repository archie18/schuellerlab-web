<?php

/* LDMMainBundle:DrSASA:download.html.twig */
class __TwigTemplate_aee809327cc9fa3a90f5f0ec538c0393c6be517f53c447f2d883c93e0940763a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "LDMMainBundle:DrSASA:download.html.twig", 1);
        $this->blocks = array(
            'main_header' => array($this, 'block_main_header'),
            'wrapper_class' => array($this, 'block_wrapper_class'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@LDMMain/baseUser.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_main_header($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"row wrapper border-bottom white-bg page-heading\">
        <div class=\"col-lg-12\">
            <h2>
                <span class=\"text-navy\"><i>dr_sasa</i> - Download</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li>
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "\">dr_sasa</a>
                </li>
                <li class=\"active\">
                    <a href=\"";
        // line 14
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa_download");
        echo "\">Download</a>
                </li>
            </ol>
        </div>
    </div>
";
    }

    // line 21
    public function block_wrapper_class($context, array $blocks = array())
    {
        echo "article";
    }

    // line 23
    public function block_main_content($context, array $blocks = array())
    {
        // line 24
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div class=\"ibox float-e-margins m-t-xl\">
                <div class=\"ibox-content text-left p-lg\">
                    <div class=\"text-center article-title\" style=\"margin-bottom:50px;\">
                        <span class=\"text-center text-navy\">
                            <h1><i>dr_sasa</i> - Download</h1>
                            <h5>Solvent Accessible Surface Area calculation software for biological molecules</h5>
                        </span>
                    </div>
                    <h3>Introduction</h3>
                    <p>
                        <i>dr-sasa</i> is a solvent accessible surface area (SASA) calculation software for biological
                        molecules, which supports proteins, nucleic acids and small organic molecules as inputs. The
                        input files can be provided in either the PDB or Mol2 format. PDB format files will use a
                        NACCESS compatible vdW radii lookup table, while Mol2 formats will use the same VdW radii
                        used in Chimera.
                    </p>
                    <h3>Operation modes</h3>
                    <p>
                        There are five operation modes. The first does common SASA calculations, the second calculates
                        the buried surface area (BSA) between various chains or molecular objects, and third and fourth
                        calculate BSA between residues and atoms as if they were independent objects. The fifth mode
                        calculates BSA without requiring that the atoms are solvent accessible. This mode simply
                        calculates the raw contact surface areas (CSA) between chains or molecular objects.
                    </p>
                    <h3>Downloads</h3>
                    <ul>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/releases\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/releases</a>
                            - Binary releases for Linux, MacOS and Windows, as well as the source code, are freely available
                            from the GitHub repository</li>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md</a> - Usage instructions</li>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/INSTALL\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/blob/master/INSTALL</a> - Installation instructions</li>
                        <li><a href=\"https://github.com/crosvera/contactplot\" target=\"_blank\">https://github.com/crosvera/contactplot</a>
                            - Python source code and installation instructions of the <i>contactplot.py</i> script to
                            generate attractive 2D surface-based contact plots.
                        </li>
                    </ul>
                    <h3>Authors</h3>
                    <p>Judemir Ribeiro, Carlos Ríos-Vera, Francisco Melo, and Andreas Schüller<p>
                    <p>Contact: <a href=\"mailto:aschueller@bio.puc.cl\">aschueller@bio.puc.cl</a></p>
                    <p>
                        Licensed under the terms of the MIT license. Copyright (c) 2018 Judemir Ribeiro, Carlos Ríos-Vera,
                        Francisco Melo, and Andreas Schüller
                    </p>
                    <h3>How to cite</h3>
                    <p>";
        // line 70
        $this->loadTemplate("LDMMainBundle:DrSASA:citation.html.twig", "LDMMainBundle:DrSASA:download.html.twig", 70)->display($context);
        echo "<p>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "LDMMainBundle:DrSASA:download.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 70,  67 => 24,  64 => 23,  58 => 21,  48 => 14,  42 => 11,  33 => 4,  30 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"@LDMMain/baseUser.html.twig\" %}

{% block main_header %}
    <div class=\"row wrapper border-bottom white-bg page-heading\">
        <div class=\"col-lg-12\">
            <h2>
                <span class=\"text-navy\"><i>dr_sasa</i> - Download</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li>
                    <a href=\"{{ path('ldm_dr_sasa') }}\">dr_sasa</a>
                </li>
                <li class=\"active\">
                    <a href=\"{{ path('ldm_dr_sasa_download') }}\">Download</a>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}

{% block wrapper_class %}article{% endblock %}

{% block main_content %}
    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div class=\"ibox float-e-margins m-t-xl\">
                <div class=\"ibox-content text-left p-lg\">
                    <div class=\"text-center article-title\" style=\"margin-bottom:50px;\">
                        <span class=\"text-center text-navy\">
                            <h1><i>dr_sasa</i> - Download</h1>
                            <h5>Solvent Accessible Surface Area calculation software for biological molecules</h5>
                        </span>
                    </div>
                    <h3>Introduction</h3>
                    <p>
                        <i>dr-sasa</i> is a solvent accessible surface area (SASA) calculation software for biological
                        molecules, which supports proteins, nucleic acids and small organic molecules as inputs. The
                        input files can be provided in either the PDB or Mol2 format. PDB format files will use a
                        NACCESS compatible vdW radii lookup table, while Mol2 formats will use the same VdW radii
                        used in Chimera.
                    </p>
                    <h3>Operation modes</h3>
                    <p>
                        There are five operation modes. The first does common SASA calculations, the second calculates
                        the buried surface area (BSA) between various chains or molecular objects, and third and fourth
                        calculate BSA between residues and atoms as if they were independent objects. The fifth mode
                        calculates BSA without requiring that the atoms are solvent accessible. This mode simply
                        calculates the raw contact surface areas (CSA) between chains or molecular objects.
                    </p>
                    <h3>Downloads</h3>
                    <ul>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/releases\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/releases</a>
                            - Binary releases for Linux, MacOS and Windows, as well as the source code, are freely available
                            from the GitHub repository</li>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md</a> - Usage instructions</li>
                        <li><a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/INSTALL\" target=\"_blank\">https://github.com/nioroso-x3/dr_sasa_n/blob/master/INSTALL</a> - Installation instructions</li>
                        <li><a href=\"https://github.com/crosvera/contactplot\" target=\"_blank\">https://github.com/crosvera/contactplot</a>
                            - Python source code and installation instructions of the <i>contactplot.py</i> script to
                            generate attractive 2D surface-based contact plots.
                        </li>
                    </ul>
                    <h3>Authors</h3>
                    <p>Judemir Ribeiro, Carlos Ríos-Vera, Francisco Melo, and Andreas Schüller<p>
                    <p>Contact: <a href=\"mailto:aschueller@bio.puc.cl\">aschueller@bio.puc.cl</a></p>
                    <p>
                        Licensed under the terms of the MIT license. Copyright (c) 2018 Judemir Ribeiro, Carlos Ríos-Vera,
                        Francisco Melo, and Andreas Schüller
                    </p>
                    <h3>How to cite</h3>
                    <p>{% include 'LDMMainBundle:DrSASA:citation.html.twig' %}<p>
                </div>
            </div>
        </div>
    </div>

{% endblock %}
", "LDMMainBundle:DrSASA:download.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/DrSASA/download.html.twig");
    }
}
