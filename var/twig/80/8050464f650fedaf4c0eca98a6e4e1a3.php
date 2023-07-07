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
        echo "<!DOCTYPE html>
<html>
<head>
<style>

body {
  font-family: Gotham, sans-serif;
  background-color: #f4f4f4;
}

.container {
  width: 80%;
  margin: auto;
  overflow: hidden;
}

form {
  margin: 30px 0;
  display: flex;
  justify-content: center;
}

form input[type=\"text\"] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  flex: 9;
}

form input[type=\"submit\"] {
  flex: 1;
  padding: 10px;
  font-size: 17px;
  background-color: #1db954;
  color: white;
  border: 1px solid grey;
  cursor: pointer;
}

form input[type=\"submit\"]:hover {
  background-color: #1ed760;
}

h1 {
  text-align: center;
  color: #333;
}

.track {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.track:nth-child(even) {
  flex-direction: row-reverse;
}

.track img {
  width: 100px;
  height: 100px;
  margin-right: 20px;
}

.track h2, .track h3 {
  margin: 0;
}

.track h3 {
  color: #666;
}

.custom-button {
  display: inline-block;
  text-decoration : none;
  background-color: #1db954;
  color: white;
  padding: 10px 20px;
  margin-top: 10px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  text-decoration: none;
}

.custom-button:hover {
  background-color: #1ed760;
}
</style>
</head>
<body>
<div class=\"container\">
  <form action=\"/showMusic\" method=\"post\">
    <input type=\"text\" name=\"textInput\"/>
    <input type=\"submit\" value=\"Rechercher\" name=\"submitInput\"/>
  </form>
  <h1>Résultats de recherche :</h1>
  ";
        // line 98
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["listemusique"] ?? null), "tracks", [], "any", false, false, false, 98), "items", [], "any", false, false, false, 98));
        foreach ($context['_seq'] as $context["_key"] => $context["track"]) {
            // line 99
            echo "    <div class=\"track\">
      <img src=\"";
            // line 100
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["track"], "album", [], "any", false, false, false, 100), "images", [], "any", false, false, false, 100)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[2] ?? null) : null), "url", [], "any", false, false, false, 100), "html", null, true);
            echo "\">
      <div>
        <h2>";
            // line 102
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["track"], "name", [], "any", false, false, false, 102), "html", null, true);
            echo "</h2>
        <h3>";
            // line 103
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (($__internal_compile_1 = twig_get_attribute($this->env, $this->source, $context["track"], "artists", [], "any", false, false, false, 103)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[0] ?? null) : null), "name", [], "any", false, false, false, 103), "html", null, true);
            echo "</h3>
        <a href=\"/addPlaylist/";
            // line 104
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["track"], "id", [], "any", false, false, false, 104), "html", null, true);
            echo "\" class=\"custom-button\">Ajouter a la playlist</a>
      </div>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['track'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 108
        echo "</div>
</body>
</html>";
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
<<<<<<< HEAD
        return array (  163 => 108,  152 => 103,  148 => 102,  143 => 100,  140 => 99,  136 => 98,  37 => 1,);
=======
        return array (  166 => 108,  156 => 104,  152 => 103,  148 => 102,  143 => 100,  140 => 99,  136 => 98,  37 => 1,);
>>>>>>> 67b635ca0aca1d4c89d2d02cb4884a9addf005cf
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
<style>

body {
  font-family: Gotham, sans-serif;
  background-color: #f4f4f4;
}

.container {
  width: 80%;
  margin: auto;
  overflow: hidden;
}

form {
  margin: 30px 0;
  display: flex;
  justify-content: center;
}

form input[type=\"text\"] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  flex: 9;
}

form input[type=\"submit\"] {
  flex: 1;
  padding: 10px;
  font-size: 17px;
  background-color: #1db954;
  color: white;
  border: 1px solid grey;
  cursor: pointer;
}

form input[type=\"submit\"]:hover {
  background-color: #1ed760;
}

h1 {
  text-align: center;
  color: #333;
}

.track {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
}

.track:nth-child(even) {
  flex-direction: row-reverse;
}

.track img {
  width: 100px;
  height: 100px;
  margin-right: 20px;
}

.track h2, .track h3 {
  margin: 0;
}

.track h3 {
  color: #666;
}

.custom-button {
  display: inline-block;
  text-decoration : none;
  background-color: #1db954;
  color: white;
  padding: 10px 20px;
  margin-top: 10px;
  border: none;
  border-radius: 50px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  text-decoration: none;
}

.custom-button:hover {
  background-color: #1ed760;
}
</style>
</head>
<body>
<div class=\"container\">
  <form action=\"/showMusic\" method=\"post\">
    <input type=\"text\" name=\"textInput\"/>
    <input type=\"submit\" value=\"Rechercher\" name=\"submitInput\"/>
  </form>
  <h1>Résultats de recherche :</h1>
  {% for track in listemusique.tracks.items %}
    <div class=\"track\">
      <img src=\"{{ track.album.images[2].url }}\">
      <div>
        <h2>{{ track.name }}</h2>
        <h3>{{ track.artists[0].name }}</h3>
        <a href=\"/addPlaylist/{{track.id}}\" class=\"custom-button\">Ajouter a la playlist</a>
      </div>
    </div>
  {% endfor %}
</div>
</body>
</html>", "index.html.twig", "/workspaces/Spotify/templates/index.html.twig");
    }
}
