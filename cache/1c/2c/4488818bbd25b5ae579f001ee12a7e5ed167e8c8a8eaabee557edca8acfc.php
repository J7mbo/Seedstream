<?php

/* home/login.html.twig */
class __TwigTemplate_1c2c4488818bbd25b5ae579f001ee12a7e5ed167e8c8a8eaabee557edca8acfc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Login";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 7
            echo "        <p>Welcome ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "security"), "token"), "user"), "username"), "html", null, true);
            echo "!</p>
        <p><a href=\"";
            // line 8
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Log out</a></p>
    ";
        } else {
            // line 10
            echo "        <form action=\"";
            echo $this->env->getExtension('routing')->getPath("login_check");
            echo "\" method=\"post\">
            <p><label for=\"username\">Username: </label><input id=\"username\" type=\"text\" name=\"_username\" value=\"";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
            echo "\"></p>
            <p><label for=\"password\">Password: </label><input id=\"password\" type=\"password\" name=\"_password\"></p>
            <p><input type=\"submit\" value=\"Log in\"></p>
            ";
            // line 14
            if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
                // line 15
                echo "                <div class=\"error\">";
                echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true);
                echo "</div>
            ";
            }
            // line 17
            echo "        </form>
    ";
        }
    }

    public function getTemplateName()
    {
        return "home/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 17,  64 => 15,  62 => 14,  56 => 11,  51 => 10,  46 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}
