<?php

/* admin/servers.html.twig */
class __TwigTemplate_5eaad9d962444ff3d62856d8e61aabe53e17776840efb3fcaf1d377a79e222b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header_title' => array($this, 'block_header_title'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 12
        $context["clientTableFields"] = array(0 => "type", 1 => "port", 2 => "endpoint", 3 => "authUsername", 4 => "authPassword");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Admin > Servers";
    }

    // line 5
    public function block_header_title($context, array $blocks = array())
    {
        echo "Servers";
    }

    // line 7
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("components/breadcrumbs/breadcrumbs.html.twig")->display(array_merge($context, array("crumbs" => array(0 => array("name" => "admin", "url" => "admin"), 1 => array("name" => "servers", "url" => "admin_servers")))));
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"col-md-13\">

        ";
        // line 18
        echo "        <div class=\"callout callout-info\">
            <h5>Server Listing</h5>
            <p>
                Here's a list of all your servers. Click on each one to view / hide associated clients.
            </p>
        </div>

        ";
        // line 26
        echo "        <div class=\"panel-group block\">
            ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["servers"]) ? $context["servers"] : $this->getContext($context, "servers")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["server"]) {
            // line 28
            echo "                <div class=\"panel panel-primary\">
                    <div class=\"panel-heading\" data-server-id=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "id"), "html", null, true);
            echo "\">
                        ";
            // line 30
            if (($this->getAttribute($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "clients"), "count") == 0)) {
                // line 31
                echo "                            <button class=\"pull-right btn btn-danger delete-server\">Delete Server</button>
                        ";
            }
            // line 33
            echo "                        <h6 class=\"panel-title\">
                            <a data-toggle=\"collapse\" href=\"#collapse-group";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "\">
                                <i class=\"icon-server\"></i>
                                ";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "html", null, true);
            echo " | Status: ";
            echo ((($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "isActive") == 1)) ? ("Active") : ("Inactive"));
            echo "
                            </a>
                        </h6>
                    </div>
                    <div id=\"collapse-group";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index"), "html", null, true);
            echo "\" class=\"table-responsive panel-collapse collapse in\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    ";
            // line 44
            if (($this->getAttribute($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "clients"), "count") == 0)) {
                // line 45
                echo "                                        <td colspan=\"";
                echo twig_escape_filter($this->env, (twig_length_filter($this->env, (isset($context["clientTableFields"]) ? $context["clientTableFields"] : $this->getContext($context, "clientTableFields"))) + 1), "html", null, true);
                echo "\">
                                            There are no clients for this server yet. <a href=\"";
                // line 46
                echo $this->env->getExtension('routing')->getPath("admin_servers_new_client_form");
                echo "\" class=\"add-server-btn\">Add one</a>?
                                        </td>
                                    ";
            } else {
                // line 49
                echo "                                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["clientTableFields"]) ? $context["clientTableFields"] : $this->getContext($context, "clientTableFields")));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 50
                    echo "                                            <th>";
                    echo twig_escape_filter($this->env, twig_title_string_filter($this->env, (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
                    echo "</th>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 52
                echo "                                        <th>Manage</th>
                                    ";
            }
            // line 54
            echo "                                </tr>
                            </thead>
                            <tbody>
                                ";
            // line 57
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "clients"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["client"]) {
                // line 58
                echo "                                    <tr data-client-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : $this->getContext($context, "client")), "id"), "html", null, true);
                echo "\" class=\"";
                echo ((($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "isActive") == 1)) ? ("success") : ("warning"));
                echo "\">
                                        ";
                // line 59
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["clientTableFields"]) ? $context["clientTableFields"] : $this->getContext($context, "clientTableFields")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 60
                    echo "                                            <td>
                                                ";
                    // line 61
                    if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                        // line 62
                        echo "                                                    ";
                        if (($this->getAttribute((isset($context["client"]) ? $context["client"] : $this->getContext($context, "client")), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))) == "transmission")) {
                            // line 63
                            echo "                                                        <img class=\"small\" src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("img/transmission.png"), "html", null, true);
                            echo "\" />
                                                    ";
                        } elseif (($this->getAttribute((isset($context["client"]) ? $context["client"] : $this->getContext($context, "client")), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))) == "deluge")) {
                            // line 65
                            echo "                                                        <img src=\"";
                            echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("img/deluge.png"), "html", null, true);
                            echo "\" />
                                                    ";
                        }
                        // line 67
                        echo "                                                ";
                    }
                    // line 68
                    echo "
                                                ";
                    // line 69
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["client"]) ? $context["client"] : $this->getContext($context, "client")), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i"))), "html", null, true);
                    echo "
                                            </td>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 72
                echo "                                        ";
                if (($this->getAttribute($this->getAttribute((isset($context["server"]) ? $context["server"] : $this->getContext($context, "server")), "clients"), "count") != 0)) {
                    // line 73
                    echo "                                            <td>
                                                <div class=\"btn-group\">
                                                    <button class=\"btn btn-icon btn-info\">
                                                        <a href=\"#\"><i class=\"icon-wrench\"></i></a>
                                                    </button>
                                                </div>
                                                <div class=\"btn-group\">
                                                    <button class=\"btn btn-icon btn-danger delete-client\">
                                                        <a><i class=\"icon icon-cross\"></i></a>
                                                    </button>
                                                </div>
                                            </td>
                                        ";
                }
                // line 86
                echo "                                    </tr>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['client'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "                            </tbody>
                        </table>
                    </div>
                </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['server'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "        </div>

        ";
        // line 96
        echo "        <div class=\"col-sm-13 text-right\">
            <a href=\"";
        // line 97
        echo $this->env->getExtension('routing')->getPath("admin_servers_new_server_form");
        echo "\"><button class=\"btn btn-info\">Add Server</button></a>
            <a href=\"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("admin_servers_new_client_form");
        echo "\"><button class=\"btn btn-info\">Add Client</button></a>
        </div>
    </div>
";
    }

    // line 103
    public function block_scripts($context, array $blocks = array())
    {
        // line 104
        echo "    ";
        $this->displayParentBlock("scripts", $context, $blocks);
        echo "
    <script type=\"text/javascript\"> var removeClientUrl = '";
        // line 105
        echo $this->env->getExtension('routing')->getPath("admin_servers_remove_client");
        echo "'; </script>
    <script type=\"text/javascript\"> var removeServerUrl = '";
        // line 106
        echo $this->env->getExtension('routing')->getPath("admin_servers_remove_server");
        echo "'; </script>
    <script src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/servers.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "admin/servers.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  333 => 107,  329 => 106,  325 => 105,  320 => 104,  317 => 103,  309 => 98,  305 => 97,  302 => 96,  298 => 93,  280 => 88,  265 => 86,  250 => 73,  247 => 72,  230 => 69,  227 => 68,  224 => 67,  218 => 65,  212 => 63,  209 => 62,  207 => 61,  204 => 60,  187 => 59,  180 => 58,  163 => 57,  158 => 54,  154 => 52,  145 => 50,  140 => 49,  134 => 46,  129 => 45,  127 => 44,  120 => 40,  111 => 36,  106 => 34,  103 => 33,  99 => 31,  97 => 30,  93 => 29,  90 => 28,  73 => 27,  70 => 26,  61 => 18,  57 => 15,  54 => 14,  49 => 8,  46 => 7,  40 => 5,  34 => 3,  29 => 12,);
    }
}
