<?php

/* admin/index.html.twig */
class __TwigTemplate_60e53e495755c0aa2dd8b56c013b10a5d4f9bf5414f2cbc3a3080ad0e28c184f extends Twig_Template
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
        echo "Admin";
    }

    // line 5
    public function block_header_title($context, array $blocks = array())
    {
        echo "Admin";
    }

    // line 7
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("components/breadcrumbs/breadcrumbs.html.twig")->display(array_merge($context, array("crumbs" => array(0 => array("name" => "admin", "url" => "admin")))));
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"col-lg-13\">
        <ul class=\"nav nav-list\">
            <li class=\"nav-header\">System Settings</li>
            <li><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("admin_servers");
        echo "\">Servers and Clients</a></li>
        </ul>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 15,  54 => 12,  51 => 11,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
