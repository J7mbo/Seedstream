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
        return array (  28 => 7,  24 => 5,  22 => 4,  119 => 53,  103 => 47,  98 => 45,  92 => 44,  87 => 42,  81 => 41,  78 => 40,  62 => 28,  35 => 9,  27 => 7,  21 => 2,  23 => 3,  19 => 3,  247 => 75,  243 => 74,  239 => 73,  235 => 72,  226 => 70,  223 => 69,  218 => 63,  213 => 59,  204 => 42,  201 => 41,  198 => 40,  194 => 38,  184 => 68,  178 => 64,  175 => 63,  169 => 59,  165 => 58,  161 => 56,  152 => 50,  150 => 49,  145 => 46,  141 => 43,  139 => 40,  136 => 58,  133 => 36,  130 => 35,  127 => 56,  122 => 14,  117 => 12,  112 => 11,  108 => 31,  95 => 23,  85 => 17,  80 => 48,  77 => 13,  74 => 12,  72 => 43,  68 => 42,  64 => 9,  60 => 8,  57 => 7,  54 => 6,  49 => 18,  46 => 69,  44 => 15,  40 => 16,  38 => 10,  32 => 2,  30 => 8,  407 => 150,  403 => 149,  399 => 148,  394 => 147,  391 => 146,  379 => 137,  374 => 135,  367 => 131,  362 => 129,  357 => 127,  352 => 125,  347 => 123,  342 => 121,  337 => 119,  332 => 117,  325 => 113,  320 => 111,  315 => 109,  310 => 107,  305 => 105,  301 => 104,  288 => 93,  282 => 88,  264 => 83,  249 => 81,  234 => 68,  231 => 71,  214 => 64,  211 => 63,  208 => 49,  202 => 60,  196 => 58,  193 => 57,  191 => 37,  188 => 36,  171 => 60,  164 => 53,  147 => 52,  142 => 61,  138 => 47,  129 => 57,  124 => 44,  116 => 39,  113 => 38,  111 => 50,  104 => 33,  97 => 29,  93 => 28,  88 => 53,  83 => 23,  66 => 22,  63 => 21,  59 => 18,  56 => 17,  51 => 8,  48 => 7,  42 => 11,  36 => 3,  31 => 8,  29 => 12,);
    }
}
