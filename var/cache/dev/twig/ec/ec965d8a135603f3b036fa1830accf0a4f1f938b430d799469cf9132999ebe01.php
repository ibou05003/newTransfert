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

/* partenaire/contrat.html.twig */
class __TwigTemplate_200d2d92d2d9fa42236b72664fee2d2b1d36dfd2997392ad199ec96567ae2a83 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "partenaire/contrat.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "partenaire/contrat.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Contrat de Prestation";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "<style>
    .droit{
        float:right;
    }
    p{
        font-size: 16px;
    }
</style>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 14
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 15
        echo "
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"offset-10 col-2 image\">
                <img alt=\"logo\" class=\"rounded float-right\" width=\"100px\" height=\"100px\" src=\"images/logo.png\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-12 text-center\">
                <h1>Contrat de prestation de service</h1>
            </div>
        </div>

        <p>Entre les soussignés :</p>
        <p>
            Raison Sociale <strong> WARI Transfert </strong>, à l'adresse <strong>Dakar Central Park Ex 4c</strong>, NINEA <strong>165748956</strong> <br> Représenté par <strong>Kabirou MBOW</strong>, <strong>PDG de WARI</strong>
        </p>
        <p>
            Ci-après désigné « le Prestataire » D’une part,
        </p>
        <p>Et :</p>
        <p>
            Raison sociale <strong> ";
        // line 37
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 37, $this->source); })()), "raisonSociale", [], "any", false, false, false, 37), "html", null, true);
        echo " </strong>, à l'adresse <strong> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 37, $this->source); })()), "adresseSociale", [], "any", false, false, false, 37), "html", null, true);
        echo " </strong>, NINEA <strong> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 37, $this->source); })()), "ninea", [], "any", false, false, false, 37), "html", null, true);
        echo " </strong> <br> Représenté par <strong> ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 37, $this->source); })()), "nomCompletPersonneRef", [], "any", false, false, false, 37), "html", null, true);
        echo " </strong>
            , CNI <strong>";
        // line 38
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 38, $this->source); })()), "cniPersonneRef", [], "any", false, false, false, 38), "html", null, true);
        echo " </strong>
        </p>
        <p>
            Ci-après désigné « le Partenaire » D’autre part,
        </p>
        <p>Il a été arrêté et convenu ce qui suit :</p>
        <h2>Article un - Nature de la mission</h2>
        <p>
            Le stratégie du client s’inscrit dans une dynamique d’offres de services du quotidien, simples, adaptées, rapides et sûres, et destinées au grand public, dans sa diversité de profils socio-économiques ou de lieux d’habitation.
        </p>
        <p>
            Le cas échéant :
        </p>
        <p>
            Dans le cadre de cette mission, le Prestataire s'engage à mettre ses collaborateurs à la disposition du Client si cela est nécessaire pour la bonne exécution de la mission. Cependant, lesdits salariés resteront sous l'autorité et sous la responsabilité
                    du Prestataire pendant leur intervention chez le Client.
        </p>
        <h2>Article deux - Prix et modalités de paiement</h2>
        <p>
            Les commissions sont répartis comme suit :
            <br>
            Pour chaque transaction :
            <br>
            <ul>
                <li>
                    L’État prend les 30%
                </li>
                <li>
                    Le système WARI : 40%
                </li>
            </ul>
            Pour le client les 30% sont répartis comme suit :
            <br>
            <ul>
                <li>
                    retrait : 20%
                </li>
                <li>
                    envoi : 10%
                </li>
            </ul>
        </p>
        <h2>Article trois - Obligations du Prestataire</h2>
        <p>
            Il est rappelé que le Prestataire est tenu à une obligation de moyens. Il doit donc exécuter sa mission conformément aux règles en vigueur dans sa profession et en se conformant à toutes les données acquises dans son domaine de compétence.
        </p>
        <p>
            Il reconnaît que le Client lui a donné une information complète sur ses besoins et sur les impératifs à respecter.
        </p>
        Il s'engage à se conformer au règlement intérieur et aux consignes de sécurité applicables chez le Client. Enfin, il s’engage à observer la confidentialité la plus totale en ce qui concerne le contenu de la mission et toutes les informations ainsi que
            tous les documents que le Client lui aura communiqués.
    </p>
    <h2>Article quatre - Obligations du Client</h2>
    <p>
        Afin de permettre au Prestataire de réaliser la mission dans de bonnes conditions, le Client s’engage à lui remettre tous les documents nécessaires dans les meilleurs délais.
    </p>
    <h2>Article cinq – Responsabilité</h2>
    <p>
        La responsabilité du Prestataire ne pourra être mise en cause qu'en cas de manquement à son obligation de moyens. En outre, le Client ne pourra pas l'invoquer dans les cas suivants :
        <ul>
            <li>s'il a omis de remettre au Prestataire un document ou une information nécessaire pour la mission,
            </li>
            <li>en cas de force majeure ou d'autres causes indépendantes de la volonté du Prestataire.</li>
        </ul>
    </p>
    <h2>Article six - Droit applicable et juridiction compétente</h2>
    <p>
        Le présent contrat est assujetti au droit français. Tout litige qui résulterait de son exécution sera soumis aux tribunaux dont dépend le siège social du Prestataire.
    </p>
    <p>
        Fait le ";
        // line 108
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y"), "html", null, true);
        echo " en deux exemplaires à <strong>Dakar</strong>
    </p>
    <div class=\"row\">
        <div class=\"col-6\">
            Le Prestataire
            <br>
            <strong>Kabirou MBOW</strong>
            <br>
            [signature]
        </div>
        <div class=\"col-6 droit\">
            Le Partenaire
            <br>
            <strong>";
        // line 121
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["partenaire"]) || array_key_exists("partenaire", $context) ? $context["partenaire"] : (function () { throw new RuntimeError('Variable "partenaire" does not exist.', 121, $this->source); })()), "nomCompletPersonneRef", [], "any", false, false, false, 121), "html", null, true);
        echo "</strong>
            <br>
            [signature]
        </div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "partenaire/contrat.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  219 => 121,  203 => 108,  130 => 38,  120 => 37,  96 => 15,  89 => 14,  74 => 4,  67 => 3,  54 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"base.html.twig\" %}
{% block title %}Contrat de Prestation{% endblock %}
{% block stylesheets %}
<style>
    .droit{
        float:right;
    }
    p{
        font-size: 16px;
    }
</style>
{% endblock %}

{% block body %}

    <div class=\"container\">
        <div class=\"row\">
            <div class=\"offset-10 col-2 image\">
                <img alt=\"logo\" class=\"rounded float-right\" width=\"100px\" height=\"100px\" src=\"images/logo.png\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-12 text-center\">
                <h1>Contrat de prestation de service</h1>
            </div>
        </div>

        <p>Entre les soussignés :</p>
        <p>
            Raison Sociale <strong> WARI Transfert </strong>, à l'adresse <strong>Dakar Central Park Ex 4c</strong>, NINEA <strong>165748956</strong> <br> Représenté par <strong>Kabirou MBOW</strong>, <strong>PDG de WARI</strong>
        </p>
        <p>
            Ci-après désigné « le Prestataire » D’une part,
        </p>
        <p>Et :</p>
        <p>
            Raison sociale <strong> {{ partenaire.raisonSociale }} </strong>, à l'adresse <strong> {{ partenaire.adresseSociale }} </strong>, NINEA <strong> {{ partenaire.ninea }} </strong> <br> Représenté par <strong> {{ partenaire.nomCompletPersonneRef }} </strong>
            , CNI <strong>{{ partenaire.cniPersonneRef }} </strong>
        </p>
        <p>
            Ci-après désigné « le Partenaire » D’autre part,
        </p>
        <p>Il a été arrêté et convenu ce qui suit :</p>
        <h2>Article un - Nature de la mission</h2>
        <p>
            Le stratégie du client s’inscrit dans une dynamique d’offres de services du quotidien, simples, adaptées, rapides et sûres, et destinées au grand public, dans sa diversité de profils socio-économiques ou de lieux d’habitation.
        </p>
        <p>
            Le cas échéant :
        </p>
        <p>
            Dans le cadre de cette mission, le Prestataire s'engage à mettre ses collaborateurs à la disposition du Client si cela est nécessaire pour la bonne exécution de la mission. Cependant, lesdits salariés resteront sous l'autorité et sous la responsabilité
                    du Prestataire pendant leur intervention chez le Client.
        </p>
        <h2>Article deux - Prix et modalités de paiement</h2>
        <p>
            Les commissions sont répartis comme suit :
            <br>
            Pour chaque transaction :
            <br>
            <ul>
                <li>
                    L’État prend les 30%
                </li>
                <li>
                    Le système WARI : 40%
                </li>
            </ul>
            Pour le client les 30% sont répartis comme suit :
            <br>
            <ul>
                <li>
                    retrait : 20%
                </li>
                <li>
                    envoi : 10%
                </li>
            </ul>
        </p>
        <h2>Article trois - Obligations du Prestataire</h2>
        <p>
            Il est rappelé que le Prestataire est tenu à une obligation de moyens. Il doit donc exécuter sa mission conformément aux règles en vigueur dans sa profession et en se conformant à toutes les données acquises dans son domaine de compétence.
        </p>
        <p>
            Il reconnaît que le Client lui a donné une information complète sur ses besoins et sur les impératifs à respecter.
        </p>
        Il s'engage à se conformer au règlement intérieur et aux consignes de sécurité applicables chez le Client. Enfin, il s’engage à observer la confidentialité la plus totale en ce qui concerne le contenu de la mission et toutes les informations ainsi que
            tous les documents que le Client lui aura communiqués.
    </p>
    <h2>Article quatre - Obligations du Client</h2>
    <p>
        Afin de permettre au Prestataire de réaliser la mission dans de bonnes conditions, le Client s’engage à lui remettre tous les documents nécessaires dans les meilleurs délais.
    </p>
    <h2>Article cinq – Responsabilité</h2>
    <p>
        La responsabilité du Prestataire ne pourra être mise en cause qu'en cas de manquement à son obligation de moyens. En outre, le Client ne pourra pas l'invoquer dans les cas suivants :
        <ul>
            <li>s'il a omis de remettre au Prestataire un document ou une information nécessaire pour la mission,
            </li>
            <li>en cas de force majeure ou d'autres causes indépendantes de la volonté du Prestataire.</li>
        </ul>
    </p>
    <h2>Article six - Droit applicable et juridiction compétente</h2>
    <p>
        Le présent contrat est assujetti au droit français. Tout litige qui résulterait de son exécution sera soumis aux tribunaux dont dépend le siège social du Prestataire.
    </p>
    <p>
        Fait le {{ \"now\"|date(\"m/d/Y\") }} en deux exemplaires à <strong>Dakar</strong>
    </p>
    <div class=\"row\">
        <div class=\"col-6\">
            Le Prestataire
            <br>
            <strong>Kabirou MBOW</strong>
            <br>
            [signature]
        </div>
        <div class=\"col-6 droit\">
            Le Partenaire
            <br>
            <strong>{{ partenaire.nomCompletPersonneRef }}</strong>
            <br>
            [signature]
        </div>
    </div>
</div>{% endblock %}", "partenaire/contrat.html.twig", "/var/www/html/API/newTransfert/templates/partenaire/contrat.html.twig");
    }
}
