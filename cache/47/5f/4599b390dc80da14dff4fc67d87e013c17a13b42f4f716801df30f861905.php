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
            </ul>

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
        return array (  119 => 53,  111 => 50,  103 => 47,  98 => 45,  92 => 44,  87 => 42,  81 => 41,  78 => 40,  62 => 28,  49 => 18,  44 => 15,  35 => 10,  30 => 8,  27 => 7,  21 => 2,  88 => 53,  80 => 48,  72 => 43,  68 => 42,  40 => 16,  38 => 15,  23 => 3,  19 => 1,  86 => 36,  82 => 35,  76 => 32,  54 => 12,  51 => 11,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
