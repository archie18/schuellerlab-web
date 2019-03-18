<?php

/* LDMMainBundle:TargPred:index.html.twig */
class __TwigTemplate_71d26291d13c3464a1b549cd46b8cadc5d4cc6ba8ae260e0f4bb92d1d975bc7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "LDMMainBundle:TargPred:index.html.twig", 1);
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
                <span class=\"text-navy\"><i>TargPred</i></span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred");
        echo "\">TargPred</a>
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
                            <h1><i>TargPred</i></h1>
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
                            <h5><b>Run <i>TargPred</i></b></h5>
                        </div>
                        <div class=\"ibox-content\">
                            ";
        // line 38
        echo         $this->env->getExtension('form')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_start');
        echo "
                            ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "molecule", array()), 'row');
        echo "
                            ";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock(($context["form"] ?? $this->getContext($context, "form")), 'errors');
        echo "
                            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "submit", array()), 'row', array("attr" => array("class" => "ladda-button btn btn-primary", "style" => "width: 100%;", "data-style" => "zoom-in")));
        echo "

                            ";
        // line 43
        echo         $this->env->getExtension('form')->renderer->renderBlock(($context["form"] ?? $this->getContext($context, "form")), 'form_end');
        echo "
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

";
    }

    // line 54
    public function block_javascripts($context, array $blocks = array())
    {
        // line 55
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
        return "LDMMainBundle:TargPred:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 55,  115 => 54,  101 => 43,  96 => 41,  92 => 40,  88 => 39,  84 => 38,  73 => 30,  62 => 21,  59 => 20,  53 => 18,  43 => 11,  34 => 4,  31 => 3,  11 => 1,);
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
                <span class=\"text-navy\"><i>TargPred</i></span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"{{ path('ldm_targpred') }}\">TargPred</a>
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
                            <h1><i>TargPred</i></h1>
                        </span>
                    </div>
                    <img src=\"{{ asset(\"bundles/ldmmain/img/dr_sasa_logo.png\") }}\" width=\"70%\" style=\"margin-left:15%\">
                    <br/>
                    <br/>
                    <div class=\"ibox float-e-margins\">
                        <div class=\"ibox-title\">
                            <h5><b>Run <i>TargPred</i></b></h5>
                        </div>
                        <div class=\"ibox-content\">
                            {{ form_start(form) }}
                            {{ form_row(form.molecule) }}
                            {{ form_errors(form) }}
                            {{ form_row(form.submit, { 'attr': {'class': 'ladda-button btn btn-primary', 'style': 'width: 100%;', 'data-style': 'zoom-in' } }) }}

                            {{ form_end(form) }}
                            
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
", "LDMMainBundle:TargPred:index.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/TargPred/index.html.twig");
    }
}
