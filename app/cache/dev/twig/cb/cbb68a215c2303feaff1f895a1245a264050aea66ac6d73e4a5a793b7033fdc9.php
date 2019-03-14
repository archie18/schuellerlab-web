<?php

/* LDMMainBundle:Default:workshop201804.html.twig */
class __TwigTemplate_c00328aaca4d2db421db0784b0ebacf02c2c6ce7b71d631d38c5cd656ed01fc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "LDMMainBundle:Default:workshop201804.html.twig", 1);
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
                <span class=\"text-navy\">Workshop 3<sup>rd</sup> PBATEOTW 2018</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a target=\"_blank\" href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_workshop201804");
        echo "\">Workshop</a>
                </li>
            </ol>
        </div>
    </div>
";
    }

    // line 18
    public function block_wrapper_class($context, array $blocks = array())
    {
        echo "article";
    }

    // line 20
    public function block_main_content($context, array $blocks = array())
    {
        // line 21
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div class=\"ibox\">
                <div class=\"ibox-content\">
                    <div class=\"text-center article-title\">
                        <span class=\"text-navy\"><h1>Cheminformatics - An introduction to computer-aided drug discovery</h1></span>
                    </div>
                    <img src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/drugs.png"), "html", null, true);
        echo "\" width=\"95%\" style=\"margin-left:2%\">
                    ";
        // line 30
        echo "                    <p class=\"text-justify\">The objective of this workshop is the simulation of a drug discovery effort of inhibitors of the serine protease Factor Xa – an important drug target for antithrombotic therapy. You will be given five drug-like compounds and it will be your task to identify the most likely candidate compound to inhibit the enzymatic activity of Factor Xa. We will employ the structure-based design method of “molecular docking” and the ligand-based method “chemical similarity search” to achieve this task.</p>
                    <br/>
                    <h2>Instructions</h2>
                    <div class=\"row well well-md\">
                        <ul>
                            <li><a target=\"_blank\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/PBATEOTW2018_Cheminformatics_Workshop.pdf"), "html", null, true);
        echo "\">Pdf handout</a></li>
                            <li><a target=\"_blank\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("workshop2018/ligands.smi"), "html", null, true);
        echo "\">ligands.smi</a></li>
                            <li><a target=\"_blank\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("workshop2018/2xbv_prep.pdb"), "html", null, true);
        echo "\">2xbv_prep.pdb</a></li>
                        </ul>
                    </div>
                    <h2>Software to be installed</h2>
                    <div class=\"row well well-md\">
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">
                            <ul>
                                <li>
                                    OpenBabel:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/OpenBabel-2.4.1-x86(32bits).exe"), "html", null, true);
        echo "\">OpenBabel Windows 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/OpenBabel-2.4.1(64bits).exe"), "html", null, true);
        echo "\">OpenBabel Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/openbabel-2.4.1.tar.gz"), "html", null, true);
        echo "\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"http://openbabel.org/wiki/Category:Installation\">MacOSX OpenBabel installation with HomeBrew or Conda</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/iBabel.zip"), "html", null, true);
        echo "\">MacOSX Ibabel</a></li>
                                    </ul>
                                </li>
                                <li>
                                    Chimera:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/chimera-1.12-win64.exe"), "html", null, true);
        echo "\">Chimera Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/chimera-1.12-win64.exe"), "html", null, true);
        echo "\">Linux 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/chimera-1.12-mac64.dmg"), "html", null, true);
        echo "\">MacOSX 64bits</a></li>
                                    </ul>
                                </li>
                                <li>
                                    Pymol:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/PyMOL-2.1.1_0-Windows-x86_64.exe"), "html", null, true);
        echo "\">Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/PyMOL-2.1.1_0-Linux-x86_64.tar.bz2"), "html", null, true);
        echo "\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/PyMOL-2.1.1_0-MacOS.dmg"), "html", null, true);
        echo "\">MacOSX Disk Image</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/pymol-edu-license.lic"), "html", null, true);
        echo "\">Licence file</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">
                            <ul>
                                <li>
                                    AutoDock Vina:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/autodock_vina_1_1_2_win32.msi"), "html", null, true);
        echo "\">AutoDock Vina Windows</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 79
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/autodock_vina_1_1_2_linux_x86.tgz"), "html", null, true);
        echo "\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/autodock_vina_1_1_2_mac.tgz"), "html", null, true);
        echo "\">MacOSX</a></li>
                                    </ul>
                                </li>
                                <li>
                                    MGLTools:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/mgltools_win32_1.5.6_Setup.exe"), "html", null, true);
        echo "\">MGLTools Windows</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/mgltools_i86Linux2_1.5.6.tar.gz"), "html", null, true);
        echo "\">Linux 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/mgltools_x86_64Linux2_1.5.6.tar.gz"), "html", null, true);
        echo "\">Linux 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/mgltools_i86Darwin9_1.5.6.tar.gz"), "html", null, true);
        echo "\">MacOSX 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/data/mgltools_ppcDarwin9_1.5.6.tar.gz"), "html", null, true);
        echo "\">MacOSX 64bits</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2>Hardware requirements</h2>
                    <div class=\"well well-md\">
                    <ul>
                        <li>Bring your own computer (Linux, Mac, Windows)</li>
                        <li>3-button mouse</li>
                    </ul>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-lg-3\"><img src=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/UC-logo.png"), "html", null, true);
        echo "\" width=\"95%\" style=\"margin-left:2%\"></div>
                        <div class=\"col-lg-3\"></div>
                        <div class=\"col-lg-1\"></div>
                        <div class=\"col-lg-5\" style=\"padding-top: 10px;\"><img src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/workshop-logo.png"), "html", null, true);
        echo "\" width=\"95%\" style=\"margin-left:2%\"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "LDMMainBundle:Default:workshop201804.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 107,  216 => 104,  199 => 90,  195 => 89,  191 => 88,  187 => 87,  183 => 86,  174 => 80,  170 => 79,  166 => 78,  153 => 68,  149 => 67,  145 => 66,  141 => 65,  132 => 59,  128 => 58,  124 => 57,  115 => 51,  110 => 49,  106 => 48,  102 => 47,  89 => 37,  85 => 36,  81 => 35,  74 => 30,  70 => 28,  61 => 21,  58 => 20,  52 => 18,  42 => 11,  33 => 4,  30 => 3,  11 => 1,);
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
                <span class=\"text-navy\">Workshop 3<sup>rd</sup> PBATEOTW 2018</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a target=\"_blank\" href=\"{{ path('ldm_workshop201804') }}\">Workshop</a>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}

{% block wrapper_class %}article{% endblock %}

{% block main_content %}
    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div class=\"ibox\">
                <div class=\"ibox-content\">
                    <div class=\"text-center article-title\">
                        <span class=\"text-navy\"><h1>Cheminformatics - An introduction to computer-aided drug discovery</h1></span>
                    </div>
                    <img src=\"{{ asset(\"bundles/ldmmain/img/drugs.png\") }}\" width=\"95%\" style=\"margin-left:2%\">
                    {#<h1>Cheminformatics - An introduction to computer-aided drug discovery</h1>#}
                    <p class=\"text-justify\">The objective of this workshop is the simulation of a drug discovery effort of inhibitors of the serine protease Factor Xa – an important drug target for antithrombotic therapy. You will be given five drug-like compounds and it will be your task to identify the most likely candidate compound to inhibit the enzymatic activity of Factor Xa. We will employ the structure-based design method of “molecular docking” and the ligand-based method “chemical similarity search” to achieve this task.</p>
                    <br/>
                    <h2>Instructions</h2>
                    <div class=\"row well well-md\">
                        <ul>
                            <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/PBATEOTW2018_Cheminformatics_Workshop.pdf') }}\">Pdf handout</a></li>
                            <li><a target=\"_blank\" href=\"{{ asset('workshop2018/ligands.smi') }}\">ligands.smi</a></li>
                            <li><a target=\"_blank\" href=\"{{ asset('workshop2018/2xbv_prep.pdb') }}\">2xbv_prep.pdb</a></li>
                        </ul>
                    </div>
                    <h2>Software to be installed</h2>
                    <div class=\"row well well-md\">
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">
                            <ul>
                                <li>
                                    OpenBabel:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/OpenBabel-2.4.1-x86(32bits).exe') }}\">OpenBabel Windows 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/OpenBabel-2.4.1(64bits).exe') }}\">OpenBabel Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/openbabel-2.4.1.tar.gz') }}\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"http://openbabel.org/wiki/Category:Installation\">MacOSX OpenBabel installation with HomeBrew or Conda</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/iBabel.zip') }}\">MacOSX Ibabel</a></li>
                                    </ul>
                                </li>
                                <li>
                                    Chimera:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/chimera-1.12-win64.exe') }}\">Chimera Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/chimera-1.12-win64.exe') }}\">Linux 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/chimera-1.12-mac64.dmg') }}\">MacOSX 64bits</a></li>
                                    </ul>
                                </li>
                                <li>
                                    Pymol:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/PyMOL-2.1.1_0-Windows-x86_64.exe') }}\">Windows 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/PyMOL-2.1.1_0-Linux-x86_64.tar.bz2') }}\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/PyMOL-2.1.1_0-MacOS.dmg') }}\">MacOSX Disk Image</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/pymol-edu-license.lic') }}\">Licence file</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-6\">
                            <ul>
                                <li>
                                    AutoDock Vina:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/autodock_vina_1_1_2_win32.msi') }}\">AutoDock Vina Windows</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/autodock_vina_1_1_2_linux_x86.tgz') }}\">Linux</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/autodock_vina_1_1_2_mac.tgz') }}\">MacOSX</a></li>
                                    </ul>
                                </li>
                                <li>
                                    MGLTools:
                                    <ul>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/mgltools_win32_1.5.6_Setup.exe') }}\">MGLTools Windows</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/mgltools_i86Linux2_1.5.6.tar.gz') }}\">Linux 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/mgltools_x86_64Linux2_1.5.6.tar.gz') }}\">Linux 64bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/mgltools_i86Darwin9_1.5.6.tar.gz') }}\">MacOSX 32bits</a></li>
                                        <li><a target=\"_blank\" href=\"{{ asset('bundles/ldmmain/data/mgltools_ppcDarwin9_1.5.6.tar.gz') }}\">MacOSX 64bits</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <h2>Hardware requirements</h2>
                    <div class=\"well well-md\">
                    <ul>
                        <li>Bring your own computer (Linux, Mac, Windows)</li>
                        <li>3-button mouse</li>
                    </ul>
                    </div>
                    <div class=\"row\">
                        <div class=\"col-lg-3\"><img src=\"{{ asset(\"bundles/ldmmain/img/UC-logo.png\") }}\" width=\"95%\" style=\"margin-left:2%\"></div>
                        <div class=\"col-lg-3\"></div>
                        <div class=\"col-lg-1\"></div>
                        <div class=\"col-lg-5\" style=\"padding-top: 10px;\"><img src=\"{{ asset(\"bundles/ldmmain/img/workshop-logo.png\") }}\" width=\"95%\" style=\"margin-left:2%\"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
", "LDMMainBundle:Default:workshop201804.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/Default/workshop201804.html.twig");
    }
}
