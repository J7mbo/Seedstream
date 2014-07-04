<?php

/* base.html.twig */
class __TwigTemplate_d753aadf408d36ee143fbac0a2ae12377650ca5c41f8a60a8059385894521699 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'headerscripts' => array($this, 'block_headerscripts'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'navbar' => array($this, 'block_navbar'),
            'sidebar' => array($this, 'block_sidebar'),
            'header_title' => array($this, 'block_header_title'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["user"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security"), "token"), "user");
        // line 2
        $context["flashbag"] = $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "getFlashBag");
        // line 3
        echo "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 33
        echo "    </head>
    <body>
        ";
        // line 35
        $this->displayBlock('body', $context, $blocks);
        // line 85
        echo "        ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 93
        echo "    </body>
</html>";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "            <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/icons.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/base.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "            ";
        $this->displayBlock('headerscripts', $context, $blocks);
        // line 14
        echo "
            <title>";
        // line 15
        $this->displayBlock('title', $context, $blocks);
        echo " - Seedstream</title>

            ";
        // line 18
        echo "            ";
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 19
            echo "                <script type=\"text/javascript\">
                    var websockets = {
                        ws: null,
                        use: function() {
                            if (websockets.ws === null) {
                                this.ws = new Websocket(\"ws://localhost:8080\", \"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id"), "html", null, true);
            echo "\", \"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "token"), "html", null, true);
            echo "\");
                            }

                            return this.ws;
                        }
                    };
                </script>
        ";
        }
        // line 32
        echo "        ";
    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 13
    public function block_headerscripts($context, array $blocks = array())
    {
    }

    // line 15
    public function block_title($context, array $blocks = array())
    {
    }

    // line 35
    public function block_body($context, array $blocks = array())
    {
        // line 36
        echo "            ";
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 37
            echo "                ";
            $this->displayBlock('navbar', $context, $blocks);
            // line 40
            echo "                <div class=\"page-container\">
                    ";
            // line 41
            $this->displayBlock('sidebar', $context, $blocks);
            // line 44
            echo "                    <div class=\"page-content\">
                        <div class=\"page-content-inner\">
                            ";
            // line 47
            echo "                            <div class=\"page-header\">
                                <div class=\"page-title\">
                                    <h3>
                                        ";
            // line 50
            $this->displayBlock('header_title', $context, $blocks);
            // line 51
            echo "                                        <small>Welcome ";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo "</small>
                                    </h3>

                                </div>
                            </div>
                            ";
            // line 57
            echo "                            <div class=\"breadcrumb-line\">
                                <ul class=\"breadcrumb\">
                                    <li><a href=\"";
            // line 59
            echo $this->env->getExtension('routing')->getPath("home");
            echo "\">Home</a></li>
                                    ";
            // line 60
            $this->displayBlock('breadcrumbs', $context, $blocks);
            // line 61
            echo "                                </ul>
                            </div>

                            ";
            // line 65
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashbag"]) ? $context["flashbag"] : $this->getContext($context, "flashbag")), "get", array(0 => "message"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 66
                echo "                                <div class=\"bg-info with-padding block-inner\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    ";
                // line 68
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 71
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashbag"]) ? $context["flashbag"] : $this->getContext($context, "flashbag")), "get", array(0 => "error"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 72
                echo "                                <div class=\"bg-error with-padding block-inner\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    ";
                // line 74
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 77
            echo "
                            ";
            // line 79
            echo "                            ";
            $this->displayBlock('content', $context, $blocks);
            // line 80
            echo "                        </div>
                    </div>
                </div>
                ";
        }
        // line 84
        echo "            ";
    }

    // line 37
    public function block_navbar($context, array $blocks = array())
    {
        // line 38
        echo "                    ";
        $this->env->loadTemplate("components/navbar/navbar.html.twig")->display($context);
        // line 39
        echo "                ";
    }

    // line 41
    public function block_sidebar($context, array $blocks = array())
    {
        // line 42
        echo "                        ";
        $this->env->loadTemplate("components/sidebar/sidebar.html.twig")->display($context);
        // line 43
        echo "                    ";
    }

    // line 50
    public function block_header_title($context, array $blocks = array())
    {
    }

    // line 60
    public function block_breadcrumbs($context, array $blocks = array())
    {
    }

    // line 79
    public function block_content($context, array $blocks = array())
    {
    }

    // line 85
    public function block_scripts($context, array $blocks = array())
    {
        // line 86
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/base.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 89
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/autobahn.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/when.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/websocket.js"), "html", null, true);
        echo "\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 91,  285 => 90,  281 => 89,  277 => 88,  273 => 87,  268 => 86,  265 => 85,  260 => 79,  255 => 60,  250 => 50,  246 => 43,  243 => 42,  240 => 41,  236 => 39,  233 => 38,  230 => 37,  226 => 84,  220 => 80,  217 => 79,  214 => 77,  205 => 74,  201 => 72,  196 => 71,  187 => 68,  183 => 66,  178 => 65,  173 => 61,  171 => 60,  167 => 59,  163 => 57,  154 => 51,  152 => 50,  147 => 47,  143 => 44,  141 => 41,  138 => 40,  135 => 37,  132 => 36,  129 => 35,  124 => 15,  119 => 13,  114 => 12,  110 => 32,  97 => 24,  90 => 19,  87 => 18,  82 => 15,  79 => 14,  76 => 13,  74 => 12,  70 => 11,  66 => 10,  62 => 9,  59 => 8,  56 => 7,  51 => 93,  48 => 85,  46 => 35,  42 => 33,  40 => 7,  34 => 3,  32 => 2,  30 => 1,);
    }
}
