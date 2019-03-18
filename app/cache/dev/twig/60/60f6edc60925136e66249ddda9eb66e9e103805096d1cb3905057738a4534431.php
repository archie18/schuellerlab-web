<?php

/* LDMMainBundle:DrSASA:results.html.twig */
class __TwigTemplate_061a00131de89cca013511cbe5d2245c42307d84653379ba3362735140c758c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@LDMMain/baseUser.html.twig", "LDMMainBundle:DrSASA:results.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'main_header' => array($this, 'block_main_header'),
            'wrapper_class' => array($this, 'block_wrapper_class'),
            'main_content' => array($this, 'block_main_content'),
            'main' => array($this, 'block_main'),
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
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <!-- blueimp gallery -->
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/css/plugins/blueimp/css/blueimp-gallery.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 9
    public function block_javascripts($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <!-- blueimp gallery -->
    <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl("bundles/ldmmain/js/plugins/blueimp/jquery.blueimp-gallery.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 16
    public function block_main_header($context, array $blocks = array())
    {
        // line 17
        echo "    <div class=\"row wrapper border-bottom white-bg page-heading\">
        <div class=\"col-lg-12\">
            <h2>
                <span class=\"text-navy\"><i>dr_sasa</i> - Results</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li>
                    <a href=\"";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "\">dr_sasa</a>
                </li>
                <li class=\"active\">
                    <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa_results", array("token" => ($context["token"] ?? $this->getContext($context, "token")))), "html", null, true);
        echo "\">Results</a>
                </li>
            </ol>
        </div>
    </div>
";
    }

    // line 34
    public function block_wrapper_class($context, array $blocks = array())
    {
        echo "article";
    }

    // line 36
    public function block_main_content($context, array $blocks = array())
    {
        // line 37
        echo "    <div class=\"row\">
        <div class=\"col-lg-10 col-lg-offset-1\">
            <div class=\"ibox float-e-margins m-t-xl\">
                <div class=\"ibox-content text-left p-lg\">
                    <div class=\"text-center article-title\" style=\"margin-bottom:50px;\">
                        <span class=\"text-center text-navy\">
                            <h1><i>dr_sasa</i> - Results</h1>
                        </span>
                    </div>
                    ";
        // line 46
        if (twig_length_filter($this->env, ($context["contactPlotFilenames"] ?? $this->getContext($context, "contactPlotFilenames")))) {
            // line 47
            echo "                    <div class=\"lightBoxGallery\">
                        ";
            // line 48
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["contactPlotFilenames"] ?? $this->getContext($context, "contactPlotFilenames")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["plot"]) {
                // line 49
                echo "                            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl(((("dr_sasa/" . ($context["token"] ?? $this->getContext($context, "token"))) . "/") . $context["plot"])), "html", null, true);
                echo "\" title=\"Contact map ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["contactPlotTitles"] ?? $this->getContext($context, "contactPlotTitles")), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "html", null, true);
                echo "\" data-gallery=\"\"><img src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl(((("dr_sasa/" . ($context["token"] ?? $this->getContext($context, "token"))) . "/") . $context["plot"])), "html", null, true);
                echo "\" width=\"150 px\"></a>
                        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plot'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "                    </div>
                    ";
        }
        // line 53
        echo "                    <p>Your results will be kept available for one week.</p>
                    ";
        // line 55
        echo "                    Results: <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bundle\TwigBundle\Extension\AssetsExtension')->getAssetUrl(((("dr_sasa/" . ($context["token"] ?? $this->getContext($context, "token"))) . "/") . ($context["zipFileName"] ?? $this->getContext($context, "zipFileName")))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ($context["zipFileName"] ?? $this->getContext($context, "zipFileName")), "html", null, true);
        echo "</a>

                    <div class=\"m-t\">
                        <strong>Command line</strong>
                    </div>
                    <pre style=\"font-size: 0.8em\">";
        // line 60
        echo twig_escape_filter($this->env, ($context["commandLine"] ?? $this->getContext($context, "commandLine")), "html", null, true);
        echo "</pre>

                    <div class=\"m-t\">
                        <strong>Output</strong>
                    </div>
                    <pre style=\"font-size: 0.8em\">";
        // line 65
        echo twig_escape_filter($this->env, ($context["output"] ?? $this->getContext($context, "output")), "html", null, true);
        echo "</pre>

                    <div class=\"m-t\">
                        <strong>Errors/warnings</strong>
                    </div>
                    <pre style=\"font-size: 0.8em; max-height: 10em;\">";
        // line 70
        echo twig_escape_filter($this->env, ($context["errorOutput"] ?? $this->getContext($context, "errorOutput")), "html", null, true);
        echo "</pre>

                </div>
                <div class=\"ibox-content text-left p-lg\">
                    <h3>How to cite</h3>
                    <p>";
        // line 75
        $this->loadTemplate("LDMMainBundle:DrSASA:citation.html.twig", "LDMMainBundle:DrSASA:results.html.twig", 75)->display($context);
        echo "<p>
                </div>

            </div>
        </div>
    </div>

";
    }

    // line 84
    public function block_main($context, array $blocks = array())
    {
        // line 85
        echo "    ";
        $this->displayParentBlock("main", $context, $blocks);
        echo "
    <!-- Blueimp gallery as lightbox dialog -->
    <div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\">
        <div class=\"slides\"></div>
        <h3 class=\"title\"></h3>
        <a class=\"prev\">‹</a>
        <a class=\"next\">›</a>
        <a class=\"close\">×</a>
        <a class=\"play-pause\"></a>
        <ol class=\"indicator\"></ol>
    </div>
";
    }

    public function getTemplateName()
    {
        return "LDMMainBundle:DrSASA:results.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 85,  208 => 84,  196 => 75,  188 => 70,  180 => 65,  172 => 60,  161 => 55,  158 => 53,  154 => 51,  133 => 49,  116 => 48,  113 => 47,  111 => 46,  100 => 37,  97 => 36,  91 => 34,  81 => 27,  75 => 24,  66 => 17,  63 => 16,  57 => 12,  51 => 10,  48 => 9,  42 => 6,  36 => 4,  33 => 3,  11 => 1,);
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

{% block stylesheets %}
    {{ parent() }}
    <!-- blueimp gallery -->
    <link href=\"{{ asset('bundles/ldmmain/css/plugins/blueimp/css/blueimp-gallery.min.css') }}\" rel=\"stylesheet\">
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <!-- blueimp gallery -->
    <script src=\"{{ asset('bundles/ldmmain/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}\"></script>
{% endblock %}


{% block main_header %}
    <div class=\"row wrapper border-bottom white-bg page-heading\">
        <div class=\"col-lg-12\">
            <h2>
                <span class=\"text-navy\"><i>dr_sasa</i> - Results</span>
            </h2>
            <ol class=\"breadcrumb\">
                <li>
                    <a href=\"{{ path('ldm_dr_sasa') }}\">dr_sasa</a>
                </li>
                <li class=\"active\">
                    <a href=\"{{ path('ldm_dr_sasa_results', {'token': token}) }}\">Results</a>
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
                            <h1><i>dr_sasa</i> - Results</h1>
                        </span>
                    </div>
                    {% if contactPlotFilenames|length %}
                    <div class=\"lightBoxGallery\">
                        {% for plot in contactPlotFilenames %}
                            <a href=\"{{ asset('dr_sasa/' ~ token ~ '/' ~ plot) }}\" title=\"Contact map {{ contactPlotTitles[loop.index0] }}\" data-gallery=\"\"><img src=\"{{ asset('dr_sasa/' ~ token ~ '/' ~ plot) }}\" width=\"150 px\"></a>
                        {% endfor %}
                    </div>
                    {% endif %}
                    <p>Your results will be kept available for one week.</p>
                    {#Uploaded file: <a href=\"{{ asset('dr_sasa/' ~ tmpDir ~ '/' ~ moleculeName) }}\">{{ moleculeName }}</a>#}
                    Results: <a href=\"{{ asset('dr_sasa/' ~ token ~ '/' ~ zipFileName) }}\">{{ zipFileName }}</a>

                    <div class=\"m-t\">
                        <strong>Command line</strong>
                    </div>
                    <pre style=\"font-size: 0.8em\">{{ commandLine }}</pre>

                    <div class=\"m-t\">
                        <strong>Output</strong>
                    </div>
                    <pre style=\"font-size: 0.8em\">{{ output }}</pre>

                    <div class=\"m-t\">
                        <strong>Errors/warnings</strong>
                    </div>
                    <pre style=\"font-size: 0.8em; max-height: 10em;\">{{ errorOutput }}</pre>

                </div>
                <div class=\"ibox-content text-left p-lg\">
                    <h3>How to cite</h3>
                    <p>{% include 'LDMMainBundle:DrSASA:citation.html.twig' %}<p>
                </div>

            </div>
        </div>
    </div>

{% endblock %}

{% block main %}
    {{ parent() }}
    <!-- Blueimp gallery as lightbox dialog -->
    <div id=\"blueimp-gallery\" class=\"blueimp-gallery blueimp-gallery-controls\">
        <div class=\"slides\"></div>
        <h3 class=\"title\"></h3>
        <a class=\"prev\">‹</a>
        <a class=\"next\">›</a>
        <a class=\"close\">×</a>
        <a class=\"play-pause\"></a>
        <ol class=\"indicator\"></ol>
    </div>
{% endblock %}", "LDMMainBundle:DrSASA:results.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/DrSASA/results.html.twig");
    }
}
