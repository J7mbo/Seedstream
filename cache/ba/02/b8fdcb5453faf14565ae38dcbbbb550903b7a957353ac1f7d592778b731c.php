<?php

/* dashboard/index.html.twig */
class __TwigTemplate_ba02b8fdcb5453faf14565ae38dcbbbb550903b7a957353ac1f7d592778b731c extends Twig_Template
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
        echo "Dashboard";
    }

    // line 5
    public function block_header_title($context, array $blocks = array())
    {
        echo "Dashboard";
    }

    // line 7
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("components/breadcrumbs/breadcrumbs.html.twig")->display(array_merge($context, array("crumbs" => array(0 => array("name" => "dashboard", "url" => "dashboard")))));
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "    <div class=\"callout callout-info fade in\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
        <h5>We're still in alpha!</h5>
        <p>
            There <strong>will</strong> still be issues and bugs about,
            so if something goes wrong, just refresh the page / try again;
            we'll have logged it and will sort it out soon!
        </p>
    </div>
    <ul class=\"info-blocks\">
        <li class=\"bg-danger\">
            <div class=\"top-info\">
                <a href=\"#\">Storage</a>
                <small>Your Available Storage</small>
            </div>
            <a href=\"#\"><i class=\"icon-drive\"></i></a>
            <span class=\"bottom-info bg-primary\">150GB Left</span>
        </li>
        <li class=\"bg-info\">
            <div class=\"top-info\">
                <a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("downloads");
        echo "\">Downloads</a>
                <small>Your Torrents</small>
            </div>
            <a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("downloads");
        echo "\"><i class=\"icon-download\"></i></a>
            <span class=\"bottom-info bg-primary\">3 Active Downloads</span>
        </li>
        <li class=\"bg-success\">
            <div class=\"top-info\">
                <a href=\"#\">Conversions</a>
                <small>Your Queue</small>
            </div>
            <a href=\"#\"><i class=\"icon-wand\"></i></a>
            <span class=\"bottom-info bg-primary\">5 Queued Conversions</span>
        </li>
        <li class=\"bg-warning\">
            <div class=\"top-info\">
                <a href=\"#\">Files</a>
                <small>Your Downloaded Files</small>
            </div>
            <a href=\"#\"><i class=\"glyphicon glyphicon-floppy-disk\"></i></a>
            <span class=\"bottom-info bg-primary\">12 Files Downloaded</span>
        </li>
        <li class=\"bg-primary\">
            <div class=\"top-info\">
                <a href=\"#\">Stream</a>
                <small>Your Streamable Videos</small>
            </div>
            <a href=\"#\"><i class=\"icon-film\"></i></a>
            <span class=\"bottom-info bg-info\">3 Videos Streamable</span>
        </li>
    </ul>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <div class=\"panel panel-default\">
                <div class=\"panel-heading\">
                    <h6 class=\"panel-title\">
                        <i class=\"icon-history\"></i>
                        Your History
                    </h6>
                </div>
                <table class=\"table table-bordered table-striped\">
                    <tbody>
                        <tr>
                            <td colspan=\"2\">Added <span class=\"text-info\">ubuntu-14.04-amd64.torrent</span> on 14/04/2014 at 16:30 GMT</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "dashboard/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 35,  76 => 32,  54 => 12,  51 => 11,  46 => 8,  43 => 7,  37 => 5,  31 => 3,);
    }
}
