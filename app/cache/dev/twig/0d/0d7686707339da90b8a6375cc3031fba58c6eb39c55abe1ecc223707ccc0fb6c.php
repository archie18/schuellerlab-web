<?php

/* @LDMMain/Default/flashMessages.html.twig */
class __TwigTemplate_0bf3aff5594a2ad39130e5ce575ac196b0a78ff2a9a83ef1e58c6bb0700a9762 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 2
            echo "    <p class=\"alert alert-success\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        ";
            // line 4
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
    </p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 8
            echo "    <p class=\"alert alert-success\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        ";
            // line 10
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
    </p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "error-notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 14
            echo "    <p class=\"alert alert-danger\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        ";
            // line 16
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
    </p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "warning"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 20
            echo "    <p class=\"alert alert-warning\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        ";
            // line 22
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
    </p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@LDMMain/Default/flashMessages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 22,  74 => 20,  70 => 19,  61 => 16,  57 => 14,  53 => 13,  44 => 10,  40 => 8,  36 => 7,  27 => 4,  23 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% for flashMessage in app.session.flashbag.get('success') %}
    <p class=\"alert alert-success\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        {{ flashMessage }}
    </p>
{% endfor %}
{% for flashMessage in app.session.flashbag.get('notice') %}
    <p class=\"alert alert-success\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        {{ flashMessage }}
    </p>
{% endfor %}
{% for flashMessage in app.session.flashbag.get('error-notice') %}
    <p class=\"alert alert-danger\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        {{ flashMessage }}
    </p>
{% endfor %}
{% for flashMessage in app.session.flashbag.get('warning') %}
    <p class=\"alert alert-warning\">
        <button type=\"button\" class=\"close close-flash-message\" aria-label=\"Close\" onclick=\"\$(this).parent().hide()\"><span aria-hidden=\"true\">&times;</span></button>
        {{ flashMessage }}
    </p>
{% endfor %}", "@LDMMain/Default/flashMessages.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/Default/flashMessages.html.twig");
    }
}
