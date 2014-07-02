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
        return array (  23 => 3,  19 => 1,  247 => 75,  243 => 74,  239 => 73,  235 => 72,  226 => 70,  223 => 69,  218 => 63,  213 => 59,  204 => 42,  201 => 41,  198 => 40,  194 => 38,  184 => 68,  178 => 64,  175 => 63,  169 => 59,  165 => 58,  161 => 56,  152 => 50,  150 => 49,  145 => 46,  141 => 43,  139 => 40,  136 => 39,  133 => 36,  130 => 35,  127 => 34,  122 => 14,  117 => 12,  112 => 11,  108 => 31,  95 => 23,  85 => 17,  80 => 48,  77 => 13,  74 => 12,  72 => 43,  68 => 42,  64 => 9,  60 => 8,  57 => 7,  54 => 6,  49 => 77,  46 => 69,  44 => 34,  40 => 16,  38 => 15,  32 => 2,  30 => 1,  407 => 150,  403 => 149,  399 => 148,  394 => 147,  391 => 146,  379 => 137,  374 => 135,  367 => 131,  362 => 129,  357 => 127,  352 => 125,  347 => 123,  342 => 121,  337 => 119,  332 => 117,  325 => 113,  320 => 111,  315 => 109,  310 => 107,  305 => 105,  301 => 104,  288 => 93,  282 => 88,  264 => 83,  249 => 81,  234 => 68,  231 => 71,  214 => 64,  211 => 63,  208 => 49,  202 => 60,  196 => 58,  193 => 57,  191 => 37,  188 => 36,  171 => 60,  164 => 53,  147 => 52,  142 => 49,  138 => 47,  129 => 45,  124 => 44,  116 => 39,  113 => 38,  111 => 37,  104 => 33,  97 => 29,  93 => 28,  88 => 53,  83 => 23,  66 => 22,  63 => 21,  59 => 18,  56 => 17,  51 => 8,  48 => 7,  42 => 5,  36 => 3,  31 => 15,  29 => 12,);
    }
}
