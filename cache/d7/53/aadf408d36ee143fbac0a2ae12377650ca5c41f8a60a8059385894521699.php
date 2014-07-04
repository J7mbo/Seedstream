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
        // line 96
        echo "        ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 104
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
            // line 48
            echo "                            <div class=\"page-header\">
                                <div class=\"page-title\">
                                    <h3>
                                        ";
            // line 51
            $this->displayBlock('header_title', $context, $blocks);
            // line 52
            echo "                                        <small>Welcome ";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo "</small>
                                    </h3>

                                </div>
                            </div>

                            ";
            // line 59
            echo "                            <div class=\"breadcrumb-line\">
                                <ul class=\"breadcrumb\">
                                    <li><a href=\"";
            // line 61
            echo $this->env->getExtension('routing')->getPath("home");
            echo "\">Home</a></li>
                                    ";
            // line 62
            $this->displayBlock('breadcrumbs', $context, $blocks);
            // line 63
            echo "                                </ul>
                            </div>

                            ";
            // line 67
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashbag"]) ? $context["flashbag"] : $this->getContext($context, "flashbag")), "get", array(0 => "success"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 68
                echo "                                <div class=\"alert alert-success\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    <i class=\"glyphicon glyphicon-ok-circle\"></i>
                                    ";
                // line 71
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashbag"]) ? $context["flashbag"] : $this->getContext($context, "flashbag")), "get", array(0 => "message"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 75
                echo "                                <div class=\"alert alert-info\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    <i class=\"glyphicon glyphicon-info-sign\"></i>
                                    ";
                // line 78
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flashbag"]) ? $context["flashbag"] : $this->getContext($context, "flashbag")), "get", array(0 => "error"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 82
                echo "                                <div class=\"alert alert-danger\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                    <i class=\"glyphicon glyphicon-remove-circle\"></i>
                                    ";
                // line 85
                echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "
                            ";
            // line 90
            echo "                            ";
            $this->displayBlock('content', $context, $blocks);
            // line 91
            echo "                        </div>
                    </div>
                </div>
                ";
        }
        // line 95
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

    // line 51
    public function block_header_title($context, array $blocks = array())
    {
    }

    // line 62
    public function block_breadcrumbs($context, array $blocks = array())
    {
    }

    // line 90
    public function block_content($context, array $blocks = array())
    {
    }

    // line 96
    public function block_scripts($context, array $blocks = array())
    {
        // line 97
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 98
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/base.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/autobahn.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/when.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 102
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
        return array (  312 => 102,  304 => 100,  300 => 99,  296 => 98,  291 => 97,  288 => 96,  283 => 90,  278 => 62,  273 => 51,  269 => 43,  266 => 42,  263 => 41,  259 => 39,  253 => 37,  249 => 95,  243 => 91,  240 => 90,  237 => 88,  228 => 85,  223 => 82,  204 => 75,  199 => 74,  190 => 71,  185 => 68,  180 => 67,  175 => 63,  173 => 62,  169 => 61,  165 => 59,  155 => 52,  153 => 51,  148 => 48,  143 => 44,  141 => 41,  138 => 40,  135 => 37,  132 => 36,  129 => 35,  124 => 15,  119 => 13,  114 => 12,  110 => 32,  97 => 24,  87 => 18,  82 => 15,  79 => 14,  76 => 13,  74 => 12,  66 => 10,  62 => 9,  59 => 8,  56 => 7,  51 => 104,  48 => 96,  42 => 33,  32 => 2,  30 => 1,  317 => 104,  313 => 103,  308 => 101,  305 => 101,  297 => 96,  293 => 94,  289 => 91,  271 => 86,  256 => 38,  241 => 71,  238 => 70,  221 => 67,  218 => 81,  215 => 65,  209 => 78,  203 => 61,  200 => 60,  198 => 59,  195 => 58,  178 => 57,  171 => 56,  154 => 55,  149 => 52,  145 => 50,  136 => 48,  131 => 47,  125 => 44,  120 => 43,  118 => 42,  111 => 38,  104 => 34,  100 => 33,  95 => 31,  90 => 19,  73 => 27,  70 => 11,  61 => 18,  57 => 15,  54 => 14,  49 => 8,  46 => 35,  40 => 7,  34 => 3,  29 => 12,);
    }
}
