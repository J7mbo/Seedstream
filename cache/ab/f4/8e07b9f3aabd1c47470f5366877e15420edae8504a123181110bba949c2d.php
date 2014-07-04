<?php

/* admin/client-form.html.twig */
class __TwigTemplate_abf48e07b9f3aabd1c47470f5366877e15420edae8504a123181110bba949c2d extends Twig_Template
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
        // line 12
        $context["availableClients"] = array(0 => "transmission", 1 => "deluge");
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Admin > New Client";
    }

    // line 5
    public function block_header_title($context, array $blocks = array())
    {
        echo "New Client";
    }

    // line 7
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->env->loadTemplate("components/breadcrumbs/breadcrumbs.html.twig")->display(array_merge($context, array("crumbs" => array(0 => array("name" => "admin", "url" => "admin"), 1 => array("name" => "servers", "url" => "admin_servers"), 2 => array("name" => "new client", "url" => "admin_servers_new_client_form")))));
    }

    // line 14
    public function block_content($context, array $blocks = array())
    {
        // line 15
        echo "    <div class=\"col-md-13\">

        ";
        // line 18
        echo "        <div class=\"callout callout-info\">
            <h5>New Client Form</h5>
            <p>
                Here you can add a new client to the pool of clients available for use. Note: any clients added
                will not have any downloads associated with them. Only new downloads added within the platform
                will have a client associated with them.
            </p>
        </div>

        ";
        // line 28
        echo "        <div class=\"panel panel-default\">
            <div class=\"panel-heading\">
                <h6 class=\"panel-title\">
                    <i class=\"icon-sidebar-button\"></i>
                    Add New Client
                </h6>
            </div>
            <div class=\"panel-body\">
                ";
        // line 36
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form-horizontal")));
        echo "
                <div class=\"row\">
                    <div class=\"col-md-12\">
                        ";
        // line 39
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
                        <div class=\"form-group\">
                            ";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "server"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Server:"));
        echo "
                            <div class=\"col-sm-5\">
                                ";
        // line 43
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "server"), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            </div>
                            ";
        // line 45
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "client"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Client:"));
        echo "
                            <div class=\"col-sm-5\">
                                ";
        // line 47
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "client"), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            </div>
                        </div>
                        <div class=\"form-group\">
                            ";
        // line 51
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "port"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Port:"));
        echo "
                            <div class=\"col-sm-2\">
                                ";
        // line 53
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "port"), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "9091")));
        echo "
                            </div>
                            ";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "endPoint"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Endpoint:"));
        echo "
                            <div class=\"col-sm-2\">
                                ";
        // line 57
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "endPoint"), 'widget', array("attr" => array("class" => "form-control", "placeholder" => "transmission/rpc")));
        echo "
                            </div>
                            ";
        // line 59
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authUsername"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Username:"));
        echo "
                            <div class=\"col-sm-2\">
                                ";
        // line 61
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authUsername"), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            </div>
                            ";
        // line 63
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authPassword"), 'label', array("label_attr" => array("class" => "col-sm-1 control-label"), "label" => "Password:"));
        echo "
                            <div class=\"col-sm-2\">
                                ";
        // line 65
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "authPassword"), 'widget', array("attr" => array("class" => "form-control")));
        echo "
                            </div>
                        </div>
                        <div class=\"form-actions text-right\">
                            ";
        // line 69
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "addClient"), 'widget', array("attr" => array("class" => "btn btn-info")));
        echo "
                        </div>
                        ";
        // line 71
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
                    </div>
                </div>
                ";
        // line 74
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "admin/client-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 74,  161 => 71,  156 => 69,  149 => 65,  144 => 63,  139 => 61,  134 => 59,  129 => 57,  124 => 55,  119 => 53,  114 => 51,  107 => 47,  102 => 45,  97 => 43,  92 => 41,  87 => 39,  81 => 36,  71 => 28,  60 => 18,  56 => 15,  53 => 14,  48 => 8,  45 => 7,  39 => 5,  33 => 3,  28 => 12,);
    }
}
