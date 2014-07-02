<?php

/* components/sidebar/sidebar.html.twig */
class __TwigTemplate_475f4599b390dc80da14dff4fc67d87e013c17a13b42f4f716801df30f861905 extends Twig_Template
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
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 2
            echo "    <div class=\"sidebar\">
        <div class=\"sidebar-content\">
            <div class=\"user-menu dropdown\">

                ";
            // line 7
            echo "                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                    <img src=\"";
            // line 8
            echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("img/default_profile.png"), "html", null, true);
            echo "\" alt=\"\">
                    <div class=\"user-info\">
                        ";
            // line 10
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo " <span>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, strtr($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "roles"), 0, array(), "array"), array("ROLE_" => ""))), "html", null, true);
            echo "</span>
                    </div>
                </a>

                ";
            // line 15
            echo "                <div class=\"popup dropdown-menu dropdown-menu-right\">
                    <div class=\"thumbnail\">
                        <div class=\"thumb\">
                            <img alt=\"\" src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("img/default_profile.png"), "html", null, true);
            echo "\">
                            <div class=\"thumb-options\">
                                <span>
                                    <a href=\"#\" class=\"btn btn-icon btn-success\"><i class=\"icon-pencil\"></i></a>
                                    <a href=\"#\" class=\"btn btn-icon btn-success\"><i class=\"icon-remove\"></i></a>
                                </span>
                            </div>
                        </div>

                        <div class=\"caption text-center\">
                            <h6>";
            // line 28
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo " <small>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, strtr($this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "roles"), 0, array(), "array"), array("ROLE_" => ""))), "html", null, true);
            echo "</small></h6>
                        </div>
                    </div>

                    <ul class=\"list-group\">
                        <li class=\"list-group-item\"><i class=\"icon-pencil3 text-muted\"></i> Downloads Active <span class=\"label label-info\">1</span></li>
                        <li class=\"list-group-item\"><i class=\"icon-people text-muted\"></i> Downloads Complete <span class=\"label label-success\">1</span></li>
                    </ul>
                </div>
            </div>

            ";
            // line 40
            echo "            <ul class=\"navigation\">
                <li class=\"";
            // line 41
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method") == "dashboard")) {
                echo "active";
            }
            echo "\">
                    <a href=\"";
            // line 42
            echo $this->env->getExtension('routing')->getPath("dashboard");
            echo "\"><span>Dashboard</span> <i class=\"icon-dashboard\"></i></a>
                </li>
                <li class=\"";
            // line 44
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method") == "downloads")) {
                echo "active";
            }
            echo "\">
                    <a href=\"";
            // line 45
            echo $this->env->getExtension('routing')->getPath("downloads");
            echo "\"><span>Downloads</span> <i class=\"glyphicon glyphicon-download\"></i></a>
                </li>
                <li class=\"";
            // line 47
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method") == "conversions")) {
                echo "active";
            }
            echo "\">
                    <a href=\"#\"><span>Conversions</span> <i class=\"icon-wand\"></i></a>
                </li>
                <li class=\"";
            // line 50
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method") == "files")) {
                echo "active";
            }
            echo "\">
                    <a href=\"#\"><span>Files</span> <i class=\"glyphicon glyphicon-floppy-disk\"></i></a>
                </li>
                <li class=\"";
            // line 53
            if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method") == "stream")) {
                echo "active";
            }
            echo "\">
                    <a href=\"#\"><span>Stream</span> <i class=\"glyphicon glyphicon-film\"></i></a>
                </li>
                ";
            // line 56
            if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_ADMIN"))) {
                // line 57
                echo "                    <li class=\"";
                if (twig_in_filter("admin", $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request"), "attributes"), "get", array(0 => "_route"), "method"))) {
                    echo "active";
                }
                echo "\">
                        <a href=\"";
                // line 58
                echo $this->env->getExtension('routing')->getPath("admin");
                echo "\"><span>Admin</span> <i class=\"glyphicon glyphicon-globe\"></i></a>
                    </li>
                ";
            }
            // line 61
            echo "            </ul>

        </div>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "components/sidebar/sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 53,  103 => 47,  98 => 45,  92 => 44,  87 => 42,  81 => 41,  78 => 40,  62 => 28,  35 => 10,  27 => 7,  21 => 2,  23 => 3,  19 => 1,  247 => 75,  243 => 74,  239 => 73,  235 => 72,  226 => 70,  223 => 69,  218 => 63,  213 => 59,  204 => 42,  201 => 41,  198 => 40,  194 => 38,  184 => 68,  178 => 64,  175 => 63,  169 => 59,  165 => 58,  161 => 56,  152 => 50,  150 => 49,  145 => 46,  141 => 43,  139 => 40,  136 => 58,  133 => 36,  130 => 35,  127 => 56,  122 => 14,  117 => 12,  112 => 11,  108 => 31,  95 => 23,  85 => 17,  80 => 48,  77 => 13,  74 => 12,  72 => 43,  68 => 42,  64 => 9,  60 => 8,  57 => 7,  54 => 6,  49 => 18,  46 => 69,  44 => 15,  40 => 16,  38 => 15,  32 => 2,  30 => 8,  407 => 150,  403 => 149,  399 => 148,  394 => 147,  391 => 146,  379 => 137,  374 => 135,  367 => 131,  362 => 129,  357 => 127,  352 => 125,  347 => 123,  342 => 121,  337 => 119,  332 => 117,  325 => 113,  320 => 111,  315 => 109,  310 => 107,  305 => 105,  301 => 104,  288 => 93,  282 => 88,  264 => 83,  249 => 81,  234 => 68,  231 => 71,  214 => 64,  211 => 63,  208 => 49,  202 => 60,  196 => 58,  193 => 57,  191 => 37,  188 => 36,  171 => 60,  164 => 53,  147 => 52,  142 => 61,  138 => 47,  129 => 57,  124 => 44,  116 => 39,  113 => 38,  111 => 50,  104 => 33,  97 => 29,  93 => 28,  88 => 53,  83 => 23,  66 => 22,  63 => 21,  59 => 18,  56 => 17,  51 => 8,  48 => 7,  42 => 5,  36 => 3,  31 => 15,  29 => 12,);
    }
}
