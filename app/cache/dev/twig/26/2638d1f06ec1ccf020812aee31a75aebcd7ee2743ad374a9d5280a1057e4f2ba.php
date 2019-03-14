<?php

/* @LDMMain/Default/member.html.twig */
class __TwigTemplate_ba196da48e60b3ad2347cd582a1f75937d64f5df84e619efaf9597a696c0fb49 extends Twig_Template
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
        echo "        <div class=\"col-xs-12 col-lg-6\">
            <div class=\"contact-box\" style=\"height: 265px;\">
                ";
        // line 4
        echo "                    <div class=\"row\">
                        <div class=\"col-xs-12 col-sm-4\">
                            <div class=\"text-center\">
                                ";
        // line 8
        echo "                                <img alt=\"image\" class=\"img-circle m-t-xs img-responsive\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl(("bundles/ldmmain/img/" . $this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "picture", array()))), "html", null, true);
        echo "\" style=\"max-height: 180px;width: auto;\">
                                ";
        // line 10
        echo "                                <div class=\"m-t-xs font-bold\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "title", array()), "html", null, true);
        echo "</div>
                            </div>
                        </div>
                        <div class=\"col-xs-12 col-sm-8\">
                            <h3><strong>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "name", array()), "html", null, true);
        echo "</strong></h3>
                            ";
        // line 16
        echo "                            <p>";
        echo $this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "description", array());
        echo "</p>
                            <address>
                                ";
        // line 19
        echo "                                ";
        // line 20
        echo "                                ";
        // line 21
        echo "                                ";
        // line 22
        echo "                                ";
        // line 23
        echo "                                ";
        if (($this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "contact", array()) == "aschueller@bio.puc.cl")) {
            // line 24
            echo "                                    <div>
                                <i class=\"fa fa-phone\"></i> Phone office: +56 2 2354 1842
                                    </div>
                                    <div>
                                <i class=\"fa fa-phone\"></i> Phone lab: +56 2 2354 2605

                                    </div>
                                ";
        }
        // line 32
        echo "                                <i class=\"fa fa-envelope\"></i> Email: ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["member"] ?? $this->getContext($context, "member")), "contact", array()), "html", null, true);
        echo "
                            </address>
                        </div>
                    </div>
                    <div class=\"clearfix\"></div>
                ";
        // line 38
        echo "            </div>
        </div>";
    }

    public function getTemplateName()
    {
        return "@LDMMain/Default/member.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 38,  72 => 32,  62 => 24,  59 => 23,  57 => 22,  55 => 21,  53 => 20,  51 => 19,  45 => 16,  41 => 14,  33 => 10,  28 => 8,  23 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("        <div class=\"col-xs-12 col-lg-6\">
            <div class=\"contact-box\" style=\"height: 265px;\">
                {#<a href=\"profile.html\">#}
                    <div class=\"row\">
                        <div class=\"col-xs-12 col-sm-4\">
                            <div class=\"text-center\">
                                {#<img alt=\"image\" class=\"img-circle m-t-xs img-responsive\" src=\"{{ asset('bundles/ldmmain/img/'~member.picture) }}\" style=\"height: 180px;width: auto;\">#}
                                <img alt=\"image\" class=\"img-circle m-t-xs img-responsive\" src=\"{{ asset('bundles/ldmmain/img/'~member.picture) }}\" style=\"max-height: 180px;width: auto;\">
                                {#<img alt=\"image\" class=\"img-circle m-t-xs img-responsive\" src=\"{{ asset('bundles/ldmmain/img/'~member.picture) }}\">#}
                                <div class=\"m-t-xs font-bold\">{{ member.title}}</div>
                            </div>
                        </div>
                        <div class=\"col-xs-12 col-sm-8\">
                            <h3><strong>{{ member.name }}</strong></h3>
                            {#<p><i class=\"fa fa-map-marker\"></i> Riviera State 32/106</p>#}
                            <p>{{ member.description|raw }}</p>
                            <address>
                                {#<strong>Twitter, Inc.</strong><br>#}
                                {#795 Folsom Ave, Suite 600<br>#}
                                {#San Francisco, CA 94107<br>#}
                                {#<abbr title=\"Phone\">contact:</abbr> (123) 456-7890#}
                                {#LALA#}
                                {% if member.contact == 'aschueller@bio.puc.cl' %}
                                    <div>
                                <i class=\"fa fa-phone\"></i> Phone office: +56 2 2354 1842
                                    </div>
                                    <div>
                                <i class=\"fa fa-phone\"></i> Phone lab: +56 2 2354 2605

                                    </div>
                                {% endif %}
                                <i class=\"fa fa-envelope\"></i> Email: {{ member.contact }}
                            </address>
                        </div>
                    </div>
                    <div class=\"clearfix\"></div>
                {#</a>#}
            </div>
        </div>", "@LDMMain/Default/member.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/Default/member.html.twig");
    }
}
