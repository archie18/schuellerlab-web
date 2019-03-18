<?php

/* LDMMainBundle:DrSASA:index.html.twig */
class __TwigTemplate_0865b7aad123aea659f5e30a10c9ff839719bb027ad9cf2b29daae639d811712 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "LDMMainBundle:DrSASA:index.html.twig", 1);
        $this->blocks = array(
            'main_header' => array($this, 'block_main_header'),
            'wrapper_class' => array($this, 'block_wrapper_class'),
            'main_content' => array($this, 'block_main_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
                <span class=\"text-navy\"><i>dr_sasa</i></span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "\">dr_sasa</a>
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
                            <h1><i>dr_sasa</i></h1>
                        </span>
                    </div>
                    <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/dr_sasa_logo.png"), "html", null, true);
        echo "\" width=\"70%\" style=\"margin-left:15%\">
                    <br/>
                    <br/>
                    <div class=\"ibox float-e-margins\">
                        <div class=\"ibox-title\">
                            <h5><b>Run <i>dr_sasa</i></b></h5>
                        </div>
                        <div class=\"ibox-content\">
                            <p>Upload a structure in PDB or Mol2 format.</p>

                            ";
        // line 40
        echo         $this->env->getExtension('form')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start');
        echo "
                            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock(($context["form"] ?? $this->getContext($context, "form")), 'errors');
        echo "

                            ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "molecule", array()), 'row');
        echo "
                            ";
        // line 44
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "mode", array()), 'row');
        echo "
                            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "submit", array()), 'row', array("attr" => array("class" => "ladda-button btn btn-primary", "style" => "width: 100%;", "data-style" => "zoom-in")));
        echo "

                            ";
        // line 47
        echo         $this->env->getExtension('form')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "

                            Help: <a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md\" target=\"_blank\">README</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

";
    }

    // line 59
    public function block_javascripts($context, array $blocks = array())
    {
        // line 60
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script>
        \$(document).ready(function () {
            // Bind normal buttons
            Ladda.bind('.ladda-button', {timeout: 10000});
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "LDMMainBundle:DrSASA:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 60,  123 => 59,  108 => 47,  103 => 45,  99 => 44,  95 => 43,  90 => 41,  86 => 40,  73 => 30,  62 => 21,  59 => 20,  53 => 18,  43 => 11,  34 => 4,  31 => 3,  11 => 1,);
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
                <span class=\"text-navy\"><i>dr_sasa</i></span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"{{ path('ldm_dr_sasa') }}\">dr_sasa</a>
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
                            <h1><i>dr_sasa</i></h1>
                        </span>
                    </div>
                    <img src=\"{{ asset(\"bundles/ldmmain/img/dr_sasa_logo.png\") }}\" width=\"70%\" style=\"margin-left:15%\">
                    <br/>
                    <br/>
                    <div class=\"ibox float-e-margins\">
                        <div class=\"ibox-title\">
                            <h5><b>Run <i>dr_sasa</i></b></h5>
                        </div>
                        <div class=\"ibox-content\">
                            <p>Upload a structure in PDB or Mol2 format.</p>

                            {{ form_start(form) }}
                            {{ form_errors(form) }}

                            {{ form_row(form.molecule) }}
                            {{ form_row(form.mode) }}
                            {{ form_row(form.submit, { 'attr': {'class': 'ladda-button btn btn-primary', 'style': 'width: 100%;', 'data-style': 'zoom-in' } }) }}

                            {{ form_end(form) }}

                            Help: <a href=\"https://github.com/nioroso-x3/dr_sasa_n/blob/master/README.md\" target=\"_blank\">README</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script>
        \$(document).ready(function () {
            // Bind normal buttons
            Ladda.bind('.ladda-button', {timeout: 10000});
        });
    </script>
{% endblock %}
", "LDMMainBundle:DrSASA:index.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/DrSASA/index.html.twig");
    }
}
