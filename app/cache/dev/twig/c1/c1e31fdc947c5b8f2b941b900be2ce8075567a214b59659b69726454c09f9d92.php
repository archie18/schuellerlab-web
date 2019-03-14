<?php

/* @LDMMain/Default/index.html.twig */
class __TwigTemplate_a7bac263d0f2653b206aaf9f80380cfa55c921324fd2cd2ac5e581949a28914f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "@LDMMain/Default/index.html.twig", 1);
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
                <span class=\"text-navy\">Welcome</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_home");
        echo "\">Home</a>
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
            <div class=\"ibox float-e-margins m-t-xl\">
                <div class=\"ibox-content text-left p-lg\">
                    <div class=\"text-center article-title\" style=\"margin-bottom:50px;\">
                        <span class=\"text-center text-navy\">
                            <h1>Laboratory of Molecular Design</h1>
                        </span>
                    </div>
                    <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/ebola.png"), "html", null, true);
        echo "\" width=\"70%\" style=\"margin-left:15%\">
                    <br/>
                    <br/>
                    <p class=\"text-justify\">Specific interaction of small molecules with macromolecules is a fundamental phenomenon of all biological processes, from gene regulation to the fight against diseases. Our main motivation in the Laboratory of Molecular Design is to decipher the molecular code of protein-ligand interactions at an atomic level. Our group is at home in the areas of bioinformatics and cheminformatics, where we develop new computational methods for the prediction of molecular binding events. Our main research interest focuses on the area of ​​computational chemogenomics, which is an interdisciplinary research field that aims to predict ligand-protein interactions at the genome level with help of in silico approaches. The identification of the target profile of small, drug-like molecules is important for the discovery of new drugs, to flag off-targets, for the identification of new targets for known drugs (repositioning / drug repurposing) and to deorphanize ligands without known targets and receptors without known ligands. The identification of targets is also a crucial step in chemical biology for the follow-up of compounds resulting from phenotypic screenings. Our approaches are based on the exploitation of information available in large biological and chemical databases, as well as on methods comparing the three-dimensional structure of proteins. In addition, in serveral collaborative research projects we work on the computer-aided drug design of dual-activity antithrombotic agents against coagulation factor Xa and platelet aggregation, on the analysis and prediction of protein-DNA interactions, on the prediction of protein-ligand binding sites and on the optimization of the sustainable, enzymatic production of nutraceuticals through rational engineering of proteins.</p>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@LDMMain/Default/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 30,  61 => 21,  58 => 20,  52 => 18,  42 => 11,  33 => 4,  30 => 3,  11 => 1,);
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
                <span class=\"text-navy\">Welcome</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"{{ path('ldm_home') }}\">Home</a>
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
                            <h1>Laboratory of Molecular Design</h1>
                        </span>
                    </div>
                    <img src=\"{{ asset(\"bundles/ldmmain/img/ebola.png\") }}\" width=\"70%\" style=\"margin-left:15%\">
                    <br/>
                    <br/>
                    <p class=\"text-justify\">Specific interaction of small molecules with macromolecules is a fundamental phenomenon of all biological processes, from gene regulation to the fight against diseases. Our main motivation in the Laboratory of Molecular Design is to decipher the molecular code of protein-ligand interactions at an atomic level. Our group is at home in the areas of bioinformatics and cheminformatics, where we develop new computational methods for the prediction of molecular binding events. Our main research interest focuses on the area of ​​computational chemogenomics, which is an interdisciplinary research field that aims to predict ligand-protein interactions at the genome level with help of in silico approaches. The identification of the target profile of small, drug-like molecules is important for the discovery of new drugs, to flag off-targets, for the identification of new targets for known drugs (repositioning / drug repurposing) and to deorphanize ligands without known targets and receptors without known ligands. The identification of targets is also a crucial step in chemical biology for the follow-up of compounds resulting from phenotypic screenings. Our approaches are based on the exploitation of information available in large biological and chemical databases, as well as on methods comparing the three-dimensional structure of proteins. In addition, in serveral collaborative research projects we work on the computer-aided drug design of dual-activity antithrombotic agents against coagulation factor Xa and platelet aggregation, on the analysis and prediction of protein-DNA interactions, on the prediction of protein-ligand binding sites and on the optimization of the sustainable, enzymatic production of nutraceuticals through rational engineering of proteins.</p>
                </div>
            </div>
        </div>
    </div>

{% endblock %}
", "@LDMMain/Default/index.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/Default/index.html.twig");
    }
}
