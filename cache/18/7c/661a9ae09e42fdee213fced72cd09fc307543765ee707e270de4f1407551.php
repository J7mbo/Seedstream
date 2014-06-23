<?php

/* components/breadcrumbs/breadcrumbs.html.twig */
class __TwigTemplate_187c661a9ae09e42fdee213fced72cd09fc307543765ee707e270de4f1407551 extends Twig_Template
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
        // line 3
        echo "
";
        // line 4
        if ((!array_key_exists("crumbs", $context))) {
            // line 5
            echo "    ";
            $context["crumbs"] = array(0 => array("url" => "", "name" => ""));
        }
        // line 7
        echo "
";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["crumbs"]) ? $context["crumbs"] : $this->getContext($context, "crumbs")));
        foreach ($context['_seq'] as $context["_key"] => $context["crumb"]) {
            // line 9
            echo "    <li>
        ";
            // line 10
            ob_start();
            echo $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["crumb"]) ? $context["crumb"] : $this->getContext($context, "crumb")), "url", array(), "array"));
            $context["url"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 11
            echo "        <a href=\"";
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["crumb"]) ? $context["crumb"] : $this->getContext($context, "crumb")), "name", array(), "array")), "html", null, true);
            echo "</a>
    </li>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['crumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "components/breadcrumbs/breadcrumbs.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 11,  28 => 7,  24 => 5,  22 => 4,  119 => 53,  111 => 50,  103 => 47,  98 => 45,  92 => 44,  87 => 42,  81 => 41,  78 => 40,  62 => 28,  49 => 18,  44 => 15,  35 => 9,  30 => 8,  27 => 7,  21 => 2,  88 => 53,  80 => 48,  72 => 43,  68 => 42,  40 => 16,  38 => 10,  23 => 3,  19 => 3,  86 => 36,  82 => 35,  76 => 32,  54 => 12,  51 => 11,  46 => 8,  43 => 7,  37 => 5,  31 => 8,);
    }
}
