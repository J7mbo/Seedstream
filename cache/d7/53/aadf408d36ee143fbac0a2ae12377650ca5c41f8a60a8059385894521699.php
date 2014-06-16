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
        echo "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        ";
        // line 6
        $this->displayBlock('head', $context, $blocks);
        // line 32
        echo "    </head>
    <body>
        ";
        // line 34
        $this->displayBlock('body', $context, $blocks);
        // line 69
        echo "        ";
        $this->displayBlock('scripts', $context, $blocks);
        // line 77
        echo "    </body>
</html>";
    }

    // line 6
    public function block_head($context, array $blocks = array())
    {
        // line 7
        echo "            <link href=\"http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/icons.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("css/base.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\">
            ";
        // line 11
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "            ";
        $this->displayBlock('headerscripts', $context, $blocks);
        // line 13
        echo "
            <title>";
        // line 14
        $this->displayBlock('title', $context, $blocks);
        echo " - Seedstream</title>

            ";
        // line 17
        echo "            ";
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 18
            echo "                <script type=\"text/javascript\">
                    var websockets = {
                        ws: null,
                        use: function() {
                            if (websockets.ws === null) {
                                this.ws = new Websocket(\"ws://localhost:8080\", \"";
            // line 23
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
        // line 31
        echo "        ";
    }

    // line 11
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 12
    public function block_headerscripts($context, array $blocks = array())
    {
    }

    // line 14
    public function block_title($context, array $blocks = array())
    {
    }

    // line 34
    public function block_body($context, array $blocks = array())
    {
        // line 35
        echo "            ";
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 36
            echo "                ";
            $this->displayBlock('navbar', $context, $blocks);
            // line 39
            echo "                <div class=\"page-container\">
                    ";
            // line 40
            $this->displayBlock('sidebar', $context, $blocks);
            // line 43
            echo "                    <div class=\"page-content\">
                        <div class=\"page-content-inner\">
                            ";
            // line 46
            echo "                            <div class=\"page-header\">
                                <div class=\"page-title\">
                                    <h3>
                                        ";
            // line 49
            $this->displayBlock('header_title', $context, $blocks);
            // line 50
            echo "                                        <small>Welcome ";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username")), "html", null, true);
            echo "</small>
                                    </h3>

                                </div>
                            </div>
                            ";
            // line 56
            echo "                            <div class=\"breadcrumb-line\">
                                <ul class=\"breadcrumb\">
                                    <li><a href=\"";
            // line 58
            echo $this->env->getExtension('routing')->getPath("home");
            echo "\">Home</a></li>
                                    ";
            // line 59
            $this->displayBlock('breadcrumbs', $context, $blocks);
            // line 60
            echo "                                </ul>
                            </div>
                            ";
            // line 63
            echo "                            ";
            $this->displayBlock('content', $context, $blocks);
            // line 64
            echo "                        </div>
                    </div>
                </div>
                ";
        }
        // line 68
        echo "            ";
    }

    // line 36
    public function block_navbar($context, array $blocks = array())
    {
        // line 37
        echo "                    ";
        $this->env->loadTemplate("components/navbar/navbar.html.twig")->display($context);
        // line 38
        echo "                ";
    }

    // line 40
    public function block_sidebar($context, array $blocks = array())
    {
        // line 41
        echo "                        ";
        $this->env->loadTemplate("components/sidebar/sidebar.html.twig")->display($context);
        // line 42
        echo "                    ";
    }

    // line 49
    public function block_header_title($context, array $blocks = array())
    {
    }

    // line 59
    public function block_breadcrumbs($context, array $blocks = array())
    {
    }

    // line 63
    public function block_content($context, array $blocks = array())
    {
    }

    // line 69
    public function block_scripts($context, array $blocks = array())
    {
        // line 70
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 71
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/base.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/autobahn.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/when.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 75
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
        return array (  247 => 75,  243 => 74,  239 => 73,  235 => 72,  231 => 71,  226 => 70,  223 => 69,  218 => 63,  213 => 59,  208 => 49,  204 => 42,  201 => 41,  198 => 40,  194 => 38,  191 => 37,  188 => 36,  184 => 68,  178 => 64,  175 => 63,  171 => 60,  169 => 59,  165 => 58,  161 => 56,  152 => 50,  150 => 49,  145 => 46,  141 => 43,  139 => 40,  136 => 39,  133 => 36,  130 => 35,  127 => 34,  122 => 14,  117 => 12,  112 => 11,  108 => 31,  95 => 23,  88 => 18,  85 => 17,  80 => 14,  77 => 13,  74 => 12,  72 => 11,  68 => 10,  64 => 9,  60 => 8,  57 => 7,  54 => 6,  49 => 77,  46 => 69,  44 => 34,  40 => 32,  38 => 6,  32 => 2,  30 => 1,);
    }
}
