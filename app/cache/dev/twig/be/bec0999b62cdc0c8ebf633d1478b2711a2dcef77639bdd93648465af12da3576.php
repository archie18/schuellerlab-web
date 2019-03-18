<?php

/* @LDMMain/sideNavigation.html.twig */
class __TwigTemplate_2cae2a1b82e8319ec63eb0c3aaefbd6470503be13dd27552e1399eea90acd8ae extends Twig_Template
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
        echo "<nav class=\"navbar-default navbar-static-side\" role=\"navigation\">
    <div class=\"sidebar-collapse\">
        <ul class=\"nav metismenu\" id=\"side-menu\">
            <li class=\"nav-header\">
                <div class=\"dropdown profile-element\">
                    ";
        // line 7
        echo "                        ";
        // line 8
        echo "                    ";
        // line 9
        echo "                    ";
        // line 10
        echo "                            <span class=\"clear\">
                                <span class=\"block m-t-xs white-text\">
                                    &nbsp;
                                </span>
                                <span class=\"m-t-xs white-text\">

                                </span>
                                ";
        // line 18
        echo "                            </span>
                    ";
        // line 20
        echo "                    ";
        // line 21
        echo "                        ";
        // line 22
        echo "                        ";
        // line 23
        echo "                        ";
        // line 24
        echo "                        ";
        // line 25
        echo "                        ";
        // line 26
        echo "                    ";
        // line 27
        echo "

                </div>
                <div class=\"logo-element\">
                    IN+
                </div>
            </li>
            <li>
                <a href=\"";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_home");
        echo "\"><i class=\"fa fa-home\"></i> <span class=\"nav-label\">Home</span></a>
            </li>
            <li>
                <a href=\"";
        // line 38
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_workshop201804");
        echo "\"><i class=\"fa fa-wrench\"></i> <span class=\"nav-label\">Workshop</span></a>
            </li>
            <li>
                <a href=\"";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_members");
        echo "\"><i class=\"fa fa-users\"></i> <span class=\"nav-label\">Lab Members</span></a>
            </li>
            <li class=\"nav-divider\">
            </li>
            <li>
                <a href=\"";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "\" onclick=\"javascript:window.location = '";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "';\"><i class=\"fa fa-laptop\"></i> <span class=\"nav-label\">dr_sasa</span></a>
                ";
        // line 48
        echo "                <ul class=\"nav nav-second-level collapse in\" style=\"\">
                    <li>
                        <a href=\"";
        // line 50
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa");
        echo "\">Web server</a>
                    </li>
                    <li>
                        <a href=\"";
        // line 53
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_dr_sasa_download");
        echo "\">Download</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"";
        // line 58
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred");
        echo "\" onclick=\"javascript:window.location = '";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred");
        echo "';\"><i class=\"fa fa-laptop\"></i> <span class=\"nav-label\">TargPred</span></a>
                ";
        // line 60
        echo "                <ul class=\"nav nav-second-level collapse in\" style=\"\">
                    <li>
                        <a href=\"";
        // line 62
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_targpred");
        echo "\">Web server</a>
                    </li>
                </ul>
            </li>
            <li class=\"nav-divider\">
            </li>
            <li>
                <a href=\"";
        // line 69
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("ldm_contact");
        echo "\"><i class=\"fa fa-envelope\"></i> <span class=\"nav-label\">Contact</span></a>
                <hr style=\"width:100%;margin: 0px 15px 0px 0px;color: #959595\"/>
            </li>
        </ul>
    </div>
</nav>";
    }

    public function getTemplateName()
    {
        return "@LDMMain/sideNavigation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 69,  122 => 62,  118 => 60,  112 => 58,  104 => 53,  98 => 50,  94 => 48,  88 => 46,  80 => 41,  74 => 38,  68 => 35,  58 => 27,  56 => 26,  54 => 25,  52 => 24,  50 => 23,  48 => 22,  46 => 21,  44 => 20,  41 => 18,  32 => 10,  30 => 9,  28 => 8,  26 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav class=\"navbar-default navbar-static-side\" role=\"navigation\">
    <div class=\"sidebar-collapse\">
        <ul class=\"nav metismenu\" id=\"side-menu\">
            <li class=\"nav-header\">
                <div class=\"dropdown profile-element\">
                    {#<span>#}
                        {#<img alt=\"image\" class=\"img-circle\" src=\"img/profile_small.jpg\" />#}
                    {#</span>#}
                    {#<a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">#}
                            <span class=\"clear\">
                                <span class=\"block m-t-xs white-text\">
                                    &nbsp;
                                </span>
                                <span class=\"m-t-xs white-text\">

                                </span>
                                {#<span class=\"text-muted text-xs block\">{% if app.user and app.user.person %}{{ app.user.person.personType.name}}{% elseif app.user %}Usuario{% else %}Anónimo{% endif %} <b class=\"caret\"></b></span> #}
                            </span>
                    {#</a>#}
                    {#<ul class=\"dropdown-menu animated fadeInRight m-t-xs\">#}
                        {#<li><a href=\"profile.html\">Profile</a></li>#}
                        {#<li><a href=\"contacts.html\">Contacts</a></li>#}
                        {#<li><a href=\"mailbox.html\">Mailbox</a></li>#}
                        {#<li class=\"divider\"></li>#}
                        {#<li><a href=\"login.html\">Logout</a></li>#}
                    {#</ul>#}


                </div>
                <div class=\"logo-element\">
                    IN+
                </div>
            </li>
            <li>
                <a href=\"{{ path('ldm_home') }}\"><i class=\"fa fa-home\"></i> <span class=\"nav-label\">Home</span></a>
            </li>
            <li>
                <a href=\"{{ path('ldm_workshop201804') }}\"><i class=\"fa fa-wrench\"></i> <span class=\"nav-label\">Workshop</span></a>
            </li>
            <li>
                <a href=\"{{ path('ldm_members') }}\"><i class=\"fa fa-users\"></i> <span class=\"nav-label\">Lab Members</span></a>
            </li>
            <li class=\"nav-divider\">
            </li>
            <li>
                <a href=\"{{ path('ldm_dr_sasa') }}\" onclick=\"javascript:window.location = '{{ path('ldm_dr_sasa') }}';\"><i class=\"fa fa-laptop\"></i> <span class=\"nav-label\">dr_sasa</span></a>
                {#<a href=\"#\"><i class=\"fa fa-sitemap\"></i> <span class=\"nav-label\">Menu Levels </span><span class=\"fa arrow\"></span></a>#}
                <ul class=\"nav nav-second-level collapse in\" style=\"\">
                    <li>
                        <a href=\"{{ path('ldm_dr_sasa') }}\">Web server</a>
                    </li>
                    <li>
                        <a href=\"{{ path('ldm_dr_sasa_download') }}\">Download</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href=\"{{ path('ldm_targpred') }}\" onclick=\"javascript:window.location = '{{ path('ldm_targpred') }}';\"><i class=\"fa fa-laptop\"></i> <span class=\"nav-label\">TargPred</span></a>
                {#<a href=\"#\"><i class=\"fa fa-sitemap\"></i> <span class=\"nav-label\">Menu Levels </span><span class=\"fa arrow\"></span></a>#}
                <ul class=\"nav nav-second-level collapse in\" style=\"\">
                    <li>
                        <a href=\"{{ path('ldm_targpred') }}\">Web server</a>
                    </li>
                </ul>
            </li>
            <li class=\"nav-divider\">
            </li>
            <li>
                <a href=\"{{ path('ldm_contact') }}\"><i class=\"fa fa-envelope\"></i> <span class=\"nav-label\">Contact</span></a>
                <hr style=\"width:100%;margin: 0px 15px 0px 0px;color: #959595\"/>
            </li>
        </ul>
    </div>
</nav>", "@LDMMain/sideNavigation.html.twig", "/var/www/schuellerlab-web/src/LDM/MainBundle/Resources/views/sideNavigation.html.twig");
    }
}
