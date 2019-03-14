<?php

/* @LDMMain/Default/members.html.twig */
class __TwigTemplate_0889fa2bb15ed9b36c6d69d25e56f1b6e2c77bc720f3c99609dd320d58f312a9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "@LDMMain/Default/members.html.twig", 1);
        $this->blocks = array(
            'main_header' => array($this, 'block_main_header'),
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
                <span class=\"text-navy\">Lab Members</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_home");
        echo "\">Lab Members</a>
                </li>
            </ol>
        </div>
    </div>
";
    }

    // line 18
    public function block_main_content($context, array $blocks = array())
    {
        // line 19
        echo "    <div class=\"row\">
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["members"] ?? $this->getContext($context, "members")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 21
            echo "            ";
            $this->loadTemplate("@LDMMain/Default/member.html.twig", "@LDMMain/Default/members.html.twig", 21)->display($context);
            // line 22
            echo "        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@LDMMain/Default/members.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 23,  77 => 22,  74 => 21,  57 => 20,  54 => 19,  51 => 18,  41 => 11,  32 => 4,  29 => 3,  11 => 1,);
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
                <span class=\"text-navy\">Lab Members</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li class=\"active\">
                    <a href=\"{{ path('ldm_home') }}\">Lab Members</a>
                </li>
            </ol>
        </div>
    </div>
{% endblock %}

{% block main_content %}
    <div class=\"row\">
        {% for member in members %}
            {% include '@LDMMain/Default/member.html.twig' %}
        {% endfor %}
    </div>
{% endblock %}
", "@LDMMain/Default/members.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/Default/members.html.twig");
    }
}
