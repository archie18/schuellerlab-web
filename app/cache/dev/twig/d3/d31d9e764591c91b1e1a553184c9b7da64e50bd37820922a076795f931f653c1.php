<?php

/* @LDMMain/base.html.twig */
class __TwigTemplate_d06911109a49993f91914d3bb5db4dea77ffa2e8961b46d8c3199573b353b9a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'bodyclass' => array($this, 'block_bodyclass'),
            'main' => array($this, 'block_main'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"Laboratory of Molecular Design - Laboratorio de Diseño Molecular\">
        <meta name=\"keywords\" content=\"Molecular design, bioinformatics, computer-aided drug design, cheminformatics\">
        <meta name=\"author\" content=\"Andreas Schüller\">
        <meta name=\"author\" content=\"Andreas Schueller\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "U"), "html", null, true);
        echo "\"/>

        <title>";
        // line 13
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/font-awesome/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <!-- Ladda style -->
        <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/plugins/ladda/ladda-themeless.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/animate.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <!-- Jasny -->
        <link href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/plugins/jasny/jasny-bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        ";
        // line 26
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "    </head>
    <body class=\"";
        // line 29
        $this->displayBlock('bodyclass', $context, $blocks);
        echo "\">
        ";
        // line 30
        $this->displayBlock('main', $context, $blocks);
        // line 31
        echo "
        <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/jquery-2.1.1.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 35
        echo "        ";
        // line 36
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/metisMenu/jquery.metisMenu.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/slimscroll/jquery.slimscroll.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/chartJs/Chart.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/inspinia.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/pace/pace.min.js"), "html", null, true);
        echo "\"></script>
        <!-- Jasny -->
        <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/jasny/jasny-bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        <!-- Ladda -->
        <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/ladda/spin.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/ladda/ladda.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/ladda/ladda.jquery.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/main.js"), "html", null, true);
        echo "?";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "U"), "html", null, true);
        echo "\"></script>
        ";
        // line 48
        $this->displayBlock('javascripts', $context, $blocks);
        // line 50
        echo "    </body>
</html>
";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "SchüllerLab";
    }

    // line 26
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 27
        echo "        ";
    }

    // line 29
    public function block_bodyclass($context, array $blocks = array())
    {
    }

    // line 30
    public function block_main($context, array $blocks = array())
    {
    }

    // line 48
    public function block_javascripts($context, array $blocks = array())
    {
        // line 49
        echo "        ";
    }

    public function getTemplateName()
    {
        return "@LDMMain/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 49,  180 => 48,  175 => 30,  170 => 29,  166 => 27,  163 => 26,  157 => 13,  151 => 50,  149 => 48,  143 => 47,  139 => 46,  135 => 45,  131 => 44,  126 => 42,  121 => 40,  117 => 39,  113 => 38,  109 => 37,  104 => 36,  102 => 35,  98 => 33,  94 => 32,  91 => 31,  89 => 30,  85 => 29,  82 => 28,  80 => 26,  76 => 25,  71 => 23,  66 => 21,  62 => 20,  57 => 18,  52 => 16,  48 => 15,  43 => 13,  36 => 11,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"Laboratory of Molecular Design - Laboratorio de Diseño Molecular\">
        <meta name=\"keywords\" content=\"Molecular design, bioinformatics, computer-aided drug design, cheminformatics\">
        <meta name=\"author\" content=\"Andreas Schüller\">
        <meta name=\"author\" content=\"Andreas Schueller\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}?{{ 'now'|date('U') }}\"/>

        <title>{% block title %}SchüllerLab{% endblock %}</title>

        <link href=\"{{ asset('bundles/ldmmain/css/bootstrap.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('bundles/ldmmain/font-awesome/css/font-awesome.css') }}\" rel=\"stylesheet\">
        <!-- Ladda style -->
        <link href=\"{{ asset('bundles/ldmmain/css/plugins/ladda/ladda-themeless.min.css') }}\" rel=\"stylesheet\">

        <link href=\"{{ asset('bundles/ldmmain/css/animate.css') }}\" rel=\"stylesheet\">
        <link href=\"{{ asset('bundles/ldmmain/css/style.css') }}\" rel=\"stylesheet\">
        <!-- Jasny -->
        <link href=\"{{ asset('bundles/ldmmain/css/plugins/jasny/jasny-bootstrap.min.css') }}\" rel=\"stylesheet\">

        <link href=\"{{ asset('bundles/ldmmain/css/main.css') }}\" rel=\"stylesheet\">
        {% block stylesheets %}
        {% endblock %}
    </head>
    <body class=\"{% block bodyclass %}{% endblock %}\">
        {% block main %}{% endblock %}

        <script src=\"{{ asset('bundles/ldmmain/js/jquery-2.1.1.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/bootstrap.js') }}\"></script>
        {#<script src=\"{{ asset('bundles/fosjsrouting/js/router.js') }}\" type=\"text/javascript\"></script>#}
        {#<script src=\"{{ path('fos_js_routing_js', {\"callback\": \"fos.Router.setData\"}) }}\" type=\"text/javascript\"></script>#}
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/metisMenu/jquery.metisMenu.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/slimscroll/jquery.slimscroll.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/chartJs/Chart.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/inspinia.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/pace/pace.min.js') }}\"></script>
        <!-- Jasny -->
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/jasny/jasny-bootstrap.min.js') }}\"></script>
        <!-- Ladda -->
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/ladda/spin.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/ladda/ladda.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/plugins/ladda/ladda.jquery.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/ldmmain/js/main.js') }}?{{ 'now'|date('U') }}\"></script>
        {% block javascripts %}
        {% endblock %}
    </body>
</html>
", "@LDMMain/base.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/base.html.twig");
    }
}
