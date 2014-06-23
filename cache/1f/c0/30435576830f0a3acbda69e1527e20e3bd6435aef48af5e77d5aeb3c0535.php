<?php

/* components/navbar/navbar.html.twig */
class __TwigTemplate_1fc030435576830f0a3acbda69e1527e20e3bd6435aef48af5e77d5aeb3c0535 extends Twig_Template
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
        echo "<div class=\"navbar navbar-inverse\" role=\"navigation\">
    <div class=\"navbar-header\">
        <a class=\"navbar-brand\" href=\"";
        // line 3
        echo $this->env->getExtension('routing')->getUrl("home");
        echo "\">Seedstream</a>
        <a class=\"sidebar-toggle\"><i class=\"icon-sidebar-button\"></i></a>
        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-icons\">
            <span class=\"sr-only\">Toggle navbar</span>
            <i class=\"glyphicon glyphicon-th-large\"></i>
        </button>
        <button type=\"button\" class=\"navbar-toggle offcanvas\">
            <span class=\"sr-only\">Toggle navigation</span>
            <i class=\"icon-sidebar-button\"></i>
        </button>
    </div>

    ";
        // line 15
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 16
            echo "        <ul class=\"nav navbar-nav navbar-right collapse\" id=\"navbar-icons\">
            <li class=\"dropdown\">
                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                    <i class=\"icon-inbox\"></i>
                    <span class=\"label label-default\">2</span>
                </a>
                <div class=\"popup dropdown-menu dropdown-menu-right\">
                    <div class=\"popup-header\">
                        <a href=\"#\" class=\"pull-left\"><i class=\"icon-spinner7\"></i></a>
                        <span>Notifications</span>
                        <a href=\"#\" class=\"pull-right\"><i class=\"icon-paragraph-justify\"></i></a>
                    </div>
                    <ul class=\"notification-list\">
                        <li>
                            <i class=\"glyphicon glyphicon-saved\"></i>
                            <div>
                                <a href=\"#\">ubuntu-13.04.iso</a> has finished <a href=\"#\">downloading</a>
                                <span>14 minutes ago</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class=\"user dropdown\">
                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                    <img src=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("img/default_profile.png"), "html", null, true);
            echo "\" alt=\"\">
                    <span>";
            // line 43
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo "</span>
                    <i class=\"caret\"></i>
                </a>
                <ul class=\"dropdown-menu dropdown-menu-right icons-right\">
                    <li><a href=\"#\"><i class=\"glyphicon glyphicon-cog\"></i> Settings</a></li>
                    <li><a href=\"";
            // line 48
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\"><i class=\"glyphicon glyphicon-log-out\"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    ";
        }
        // line 53
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "components/navbar/navbar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 53,  80 => 48,  72 => 43,  68 => 42,  40 => 16,  38 => 15,  23 => 3,  19 => 1,  86 => 36,  82 => 35,  76 => 32,  54 => 12,  51 => 11,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
