<?php

/* downloads/index.html.twig */
class __TwigTemplate_6be13c7cab84795803fb6c714a59651d20875a6e24f6a49c57430e479390cf21 extends Twig_Template
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Downloads";
    }

    // line 5
    public function block_header_title($context, array $blocks = array())
    {
        echo "Downloads";
    }

    // line 7
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("components/breadcrumbs/breadcrumbs.html.twig")->display(array_merge($context, array("crumbs" => array(0 => array("name" => "downloads", "url" => "downloads")))));
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "
";
    }

    // line 15
    public function block_scripts($context, array $blocks = array())
    {
        // line 16
        echo "    ";
        $this->displayParentBlock("scripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('entea_asset')->asset("js/downloads.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "downloads/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 17,  63 => 16,  60 => 15,  55 => 12,  52 => 11,  47 => 8,  44 => 7,  38 => 5,  32 => 3,);
    }
}
