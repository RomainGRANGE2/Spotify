<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* index.html.twig */
class __TwigTemplate_fc4031e373bdc003037f1d86dbae2e33 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<form action=\"/showMusic\" method=\"post\">
  <input type=\"text\" name=\"textInput\"/>
  <input type=\"submit\" value=\"Rechercher\" name=\"submitInput\"/><br>
</form>
<h1>Résultats de recherche :</h1>
";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["listemusique"] ?? null), "tracks", [], "any", false, false, false, 6), "items", [], "any", false, false, false, 6));
        foreach ($context['_seq'] as $context["_key"] => $context["track"]) {
            // line 7
            echo "  <h2>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["track"], "name", [], "any", false, false, false, 7), "html", null, true);
            echo "</h2>
  <h3>";
            // line 8
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["track"], "artists", [], "any", false, false, false, 8)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "name", [], "any", false, false, false, 8), "html", null, true);
            echo "</h3>
  <img src=\"";
            // line 9
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["track"], "album", [], "any", false, false, false, 9), "images", [], "any", false, false, false, 9)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[2] ?? null) : null), "url", [], "any", false, false, false, 9), "html", null, true);
            echo "\">
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['track'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 9,  53 => 8,  48 => 7,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form action=\"/showMusic\" method=\"post\">
  <input type=\"text\" name=\"textInput\"/>
  <input type=\"submit\" value=\"Rechercher\" name=\"submitInput\"/><br>
</form>
<h1>Résultats de recherche :</h1>
{% for track in listemusique.tracks.items %}
  <h2>{{ track.name }}</h2>
  <h3>{{ track.artists[0].name }}</h3>
  <img src=\"{{ track.album.images[2].url }}\">
{% endfor %}", "index.html.twig", "/workspaces/Spotify/templates/index.html.twig");
    }
}
