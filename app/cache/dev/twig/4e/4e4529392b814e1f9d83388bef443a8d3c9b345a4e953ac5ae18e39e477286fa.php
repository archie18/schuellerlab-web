<?php

/* @LDMMain/baseUser.html.twig */
class __TwigTemplate_69aab0436242fe3815c32e1268c778ea09372946ed2bc4bc90ace5d2ee4aee9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/base.html.twig", "@LDMMain/baseUser.html.twig", 1);
        $this->blocks = array(
            'bodyclass' => array($this, 'block_bodyclass'),
            'main' => array($this, 'block_main'),
            'main_header' => array($this, 'block_main_header'),
            'wrapper_class' => array($this, 'block_wrapper_class'),
            'main_content' => array($this, 'block_main_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@LDMMain/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_bodyclass($context, array $blocks = array())
    {
        echo "md-skin fixed-sidebar fixed-nav";
    }

    // line 4
    public function block_main($context, array $blocks = array())
    {
        // line 5
        echo "    <div id=\"wrapper\">
        ";
        // line 6
        $this->loadTemplate("@LDMMain/sideNavigation.html.twig", "@LDMMain/baseUser.html.twig", 6)->display($context);
        // line 7
        echo "        <div id=\"page-wrapper\" class=\"gray-bg\">
            <div class=\"row border-bottom\">
                ";
        // line 9
        $this->loadTemplate("@LDMMain/navigation.html.twig", "@LDMMain/baseUser.html.twig", 9)->display($context);
        // line 10
        echo "            </div>
            ";
        // line 11
        $this->displayBlock('main_header', $context, $blocks);
        // line 12
        echo "            <div class=\"wrapper wrapper-content animated fadeInRight ";
        $this->displayBlock('wrapper_class', $context, $blocks);
        echo "\">
            ";
        // line 14
        echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        ";
        // line 16
        $this->loadTemplate("@LDMMain/Default/flashMessages.html.twig", "@LDMMain/baseUser.html.twig", 16)->display($context);
        // line 17
        echo "                        ";
        $this->displayBlock('main_content', $context, $blocks);
        // line 18
        echo "                    </div>
                </div>
            </div>
            ";
        // line 22
        echo "                ";
        // line 23
        echo "            ";
        // line 24
        echo "            <footer id=\"footer\" class=\"row footer\">
                <div class=\"container center-block col-xs-12\">
                    <img src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/img/logo-gris.png"), "html", null, true);
        echo "\" width=\"140\"  style=\"display: block; margin:auto\">
                    <p></p>
                    <p></p>
                    <p class=\"text-muted\">Laboratory of Molecular Design.</p>
                    <p>Optimizado para: Chrome 64 - Safari 10 - Firefox 58 - Internet Explorer 11</p>
                    <p>Desarrollado por SchuellerLab, Facultad de Ciencias Biológicas, Universidad Católica de Chile</p>
                    <p>Abril 2018</p>
                    <br/>
                </div>
            </footer>
        </div>
    </div>
";
    }

    // line 11
    public function block_main_header($context, array $blocks = array())
    {
    }

    // line 12
    public function block_wrapper_class($context, array $blocks = array())
    {
    }

    // line 17
    public function block_main_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@LDMMain/baseUser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 17,  106 => 12,  101 => 11,  84 => 26,  80 => 24,  78 => 23,  76 => 22,  71 => 18,  68 => 17,  66 => 16,  62 => 14,  57 => 12,  55 => 11,  52 => 10,  50 => 9,  46 => 7,  44 => 6,  41 => 5,  38 => 4,  32 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"@LDMMain/base.html.twig\" %}

{% block bodyclass %}md-skin fixed-sidebar fixed-nav{% endblock %}
{% block main %}
    <div id=\"wrapper\">
        {% include '@LDMMain/sideNavigation.html.twig' %}
        <div id=\"page-wrapper\" class=\"gray-bg\">
            <div class=\"row border-bottom\">
                {% include \"@LDMMain/navigation.html.twig\" %}
            </div>
            {% block main_header %}{% endblock %}
            <div class=\"wrapper wrapper-content animated fadeInRight {% block wrapper_class %}{% endblock %}\">
            {#<div class=\"wrapper wrapper-content animated fadeInRight\">#}
                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        {% include '@LDMMain/Default/flashMessages.html.twig' %}
                        {% block main_content %}{% endblock %}
                    </div>
                </div>
            </div>
            {#<div class=\"footer\">#}
                {##}
            {#</div>#}
            <footer id=\"footer\" class=\"row footer\">
                <div class=\"container center-block col-xs-12\">
                    <img src=\"{{asset('bundles/ldmmain/img/logo-gris.png')}}\" width=\"140\"  style=\"display: block; margin:auto\">
                    <p></p>
                    <p></p>
                    <p class=\"text-muted\">Laboratory of Molecular Design.</p>
                    <p>Optimizado para: Chrome 64 - Safari 10 - Firefox 58 - Internet Explorer 11</p>
                    <p>Desarrollado por SchuellerLab, Facultad de Ciencias Biológicas, Universidad Católica de Chile</p>
                    <p>Abril 2018</p>
                    <br/>
                </div>
            </footer>
        </div>
    </div>
{% endblock %}

", "@LDMMain/baseUser.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/baseUser.html.twig");
    }
}
