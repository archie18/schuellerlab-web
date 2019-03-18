<?php

/* @LDMMain/TargPred/running.html.twig */
class __TwigTemplate_9aef7e78e9ddc853750a4f1e449eddbc4c9dcffd0784a33dbf23b83446d842ee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "@LDMMain/TargPred/running.html.twig", 1);
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
                <span class=\"text-navy\"><i>TargPred</i> - Running</span>
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
                            <h1><i>TargPred</i> - Running...</h1>
                        </span>
                    </div>
                    <p>
                        Your job has been submitted. To check whether your job has finished and to see your results
                        please access the following link:
                    </p>
                    <p>
                        <a href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred_results", array("token" => ($context["token"] ?? $this->getContext($context, "token")))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "request", array()), "getSchemeAndHttpHost", array(), "method"), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred_results", array("token" => ($context["token"] ?? $this->getContext($context, "token")))), "html", null, true);
        echo "</a>
                    </p>
                    <p>Refreshing page...</p>
                    <div class=\"progress\">
                        <div style=\"width: 0%\" aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"0\" role=\"progressbar\" class=\"progress-bar progress-bar-success\">
                            <span class=\"sr-only\">0%</span>
                        </div>
                    </div>
                    <script>
                        setInterval(function(){
                            var value = parseInt(\$('.progress-bar').attr('aria-valuenow')) + 1;
                            \$('.progress-bar').attr('aria-valuenow', value);
                            \$('.progress-bar').width(value + '%');
                            if (value == 100) {
                                location.reload();
                            }
                        }, 200);
                    </script>
                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "@LDMMain/TargPred/running.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 35,  61 => 21,  58 => 20,  52 => 18,  42 => 11,  33 => 4,  30 => 3,  11 => 1,);
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
                <span class=\"text-navy\"><i>TargPred</i> - Running</span>
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
                            <h1><i>TargPred</i> - Running...</h1>
                        </span>
                    </div>
                    <p>
                        Your job has been submitted. To check whether your job has finished and to see your results
                        please access the following link:
                    </p>
                    <p>
                        <a href=\"{{ path('ldm_targpred_results', {'token': token}) }}\">{{ app.request.getSchemeAndHttpHost() }}{{ path('ldm_targpred_results', {'token': token}) }}</a>
                    </p>
                    <p>Refreshing page...</p>
                    <div class=\"progress\">
                        <div style=\"width: 0%\" aria-valuemax=\"100\" aria-valuemin=\"0\" aria-valuenow=\"0\" role=\"progressbar\" class=\"progress-bar progress-bar-success\">
                            <span class=\"sr-only\">0%</span>
                        </div>
                    </div>
                    <script>
                        setInterval(function(){
                            var value = parseInt(\$('.progress-bar').attr('aria-valuenow')) + 1;
                            \$('.progress-bar').attr('aria-valuenow', value);
                            \$('.progress-bar').width(value + '%');
                            if (value == 100) {
                                location.reload();
                            }
                        }, 200);
                    </script>
                </div>
            </div>
        </div>
    </div>

{% endblock %}
", "@LDMMain/TargPred/running.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/TargPred/running.html.twig");
    }
}
