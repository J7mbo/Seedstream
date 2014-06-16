<?php

/* home/index.html.twig */
class __TwigTemplate_753620887f78fdb92e6fbc110aebf2420b9efb8fb5d57f978a175c3263d85d10 extends Twig_Template
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
        echo "Explain what Seedstream is...

";
        // line 3
        if (call_user_func_array($this->env->getFunction('is_granted')->getCallable(), array("ROLE_USER"))) {
            // line 4
            echo "    <p>You are already logged in</p>
    <a href=\"";
            // line 5
            echo $this->env->getExtension('routing')->getPath("dashboard");
            echo "\">Dashboard</a>
    <a href=\"";
            // line 6
            echo $this->env->getExtension('routing')->getPath("logout");
            echo "\">Logout</a>
";
        } else {
            // line 8
            echo "    <p>You are not currently logged in</p>
    <a href=\"";
            // line 9
            echo $this->env->getExtension('routing')->getPath("login");
            echo "\">Login</a>
";
        }
    }

    public function getTemplateName()
    {
        return "home/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 9,  37 => 8,  32 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
