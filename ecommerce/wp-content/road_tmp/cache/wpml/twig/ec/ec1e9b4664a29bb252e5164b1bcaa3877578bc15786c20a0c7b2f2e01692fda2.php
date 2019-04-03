<?php

/* troubleshooting.twig */
class __TwigTemplate_ac518f6b6045e53cdf92470cfc4dc2a703ce68c63a7e3fe5b42789ced1f4f3e6 extends Twig_Template
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
        echo "<div class=\"wrap wcml_trblsh\">
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "troubl", array()), "html", null, true);
        echo "</h2>
    <div class=\"wcml_trbl_warning\">
        <h3>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "backup", array()), "html", null, true);
        echo "</h3>
    </div>
    <div class=\"trbl_variables_products\">
        <h3>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync", array()), "html", null, true);
        echo "</h3>
        <ul>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_update_product_count\" />
                    ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "upd_prod_count", array()), "html", null, true);
        echo "
                    <span class=\"var_status\">";
        // line 13
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "prod_var", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_product_variations\" checked=\"checked\" />
                    ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_var", array()), "html", null, true);
        echo "
                    <span class=\"var_status\">";
        // line 21
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            ";
        // line 26
        if (($context["media_def"] ?? null)) {
            // line 27
            echo "                <li>
                    <label>
                        <input type=\"checkbox\" id=\"wcml_sync_gallery_images\" />
                        ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_gallery", array()), "html", null, true);
            echo "
                        <span class=\"gallery_status\">";
            // line 31
            echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
            echo "</span>&nbsp;
                        <span>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
            echo "</span>
                    </label>
                </li>
            ";
        }
        // line 36
        echo "            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_categories\" />
                    ";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_cat", array()), "html", null, true);
        echo "
                    <span class=\"cat_status\">";
        // line 40
        echo twig_escape_filter($this->env, ($context["prod_categories_count"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_duplicate_terms\" ";
        // line 47
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        echo " />
                    ";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "dup_terms", array()), "html", null, true);
        echo "
                    <select id=\"attr_to_duplicate\" ";
        // line 49
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        echo " >
                        ";
        // line 50
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            // line 51
            echo "                            <option value=\"0\" >";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "none", array()), "html", null, true);
            echo "</option>
                        ";
        }
        // line 53
        echo "
                        ";
        // line 54
        $context["terms_count"] = 0;
        // line 55
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["all_products_taxonomies"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tax"]) {
            // line 56
            echo "                            ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 57
                echo "                                ";
                $context["terms_count"] = $this->getAttribute($context["tax"], "terms_count", array());
                // line 58
                echo "                            ";
            }
            // line 59
            echo "
                            <option value=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($context["tax"], "tax_key", array()));
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tax"], "terms_count", array()), "html", null, true);
            echo "\">
                                ";
            // line 61
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["tax"], "labels", array()), "name", array())), "html", null, true);
            echo "
                            </option>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                    </select>
                    <span class=\"attr_status\">";
        // line 65
        echo twig_escape_filter($this->env, ($context["terms_count"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_stock\" />
                    ";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_stock", array()), "html", null, true);
        echo "
                    <span class=\"stock_status\">";
        // line 74
        echo twig_escape_filter($this->env, ($context["sync_stock_count"] ?? null), "html", null, true);
        echo "</span>
                    <span>";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <button type=\"button\" class=\"button-secondary\" id=\"wcml_trbl\">";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "start", array()), "html", null, true);
        echo "</button>
                <input id=\"count_prod_variat\" type=\"hidden\" value=\"";
        // line 80
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_prod\" type=\"hidden\" value=\"";
        // line 81
        echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_galleries\" type=\"hidden\" value=\"";
        // line 82
        echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_categories\" type=\"hidden\" value=\"";
        // line 83
        echo twig_escape_filter($this->env, ($context["prod_categories_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_terms\" type=\"hidden\" value=\"<";
        // line 84
        echo twig_escape_filter($this->env, ($context["terms_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_stock\" type=\"hidden\" value=\"<";
        // line 85
        echo twig_escape_filter($this->env, ($context["sync_stock_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"sync_galerry_page\" type=\"hidden\" value=\"0\"/>
                <input id=\"sync_category_page\" type=\"hidden\" value=\"0\"/>
                <span class=\"spinner\"></span>
                ";
        // line 89
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_update_count", array());
        echo "
                ";
        // line 90
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_variations", array());
        echo "
                ";
        // line 91
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_gallery_images", array());
        echo "
                ";
        // line 92
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_categories", array());
        echo "
                ";
        // line 93
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_duplicate_terms", array());
        echo "
                ";
        // line 94
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_stock", array());
        echo "
            </li>
        </ul>
        ";
        // line 97
        if (($context["product_type_sync_needed"] ?? null)) {
            // line 98
            echo "            <h3>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "delete_terms", array()), "html", null, true);
            echo "</h3>
            <div>
                <button type=\"button\" class=\"button-secondary\" id=\"wcml_product_type_trbl\">";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "start", array()), "html", null, true);
            echo "</button>
                <span class=\"product_type_spinner\"></span>
                <span class=\"product_type_fix_done\" style=\"display: none\">";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "product_type_fix_done", array()), "html", null, true);
            echo "</span>
                ";
            // line 103
            echo $this->getAttribute(($context["nonces"] ?? null), "trbl_product_type_terms", array());
            echo "
            </div>
        ";
        }
        // line 106
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "troubleshooting.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  311 => 106,  305 => 103,  301 => 102,  296 => 100,  290 => 98,  288 => 97,  282 => 94,  278 => 93,  274 => 92,  270 => 91,  266 => 90,  262 => 89,  255 => 85,  251 => 84,  247 => 83,  243 => 82,  239 => 81,  235 => 80,  231 => 79,  224 => 75,  220 => 74,  216 => 73,  206 => 66,  202 => 65,  199 => 64,  182 => 61,  176 => 60,  173 => 59,  170 => 58,  167 => 57,  164 => 56,  146 => 55,  144 => 54,  141 => 53,  135 => 51,  133 => 50,  127 => 49,  123 => 48,  117 => 47,  108 => 41,  104 => 40,  100 => 39,  95 => 36,  88 => 32,  84 => 31,  80 => 30,  75 => 27,  73 => 26,  66 => 22,  62 => 21,  58 => 20,  49 => 14,  45 => 13,  41 => 12,  33 => 7,  27 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "troubleshooting.twig", "E:\\xampp708\\htdocs\\wp\\nikado\\wp-content\\plugins\\woocommerce-multilingual\\templates\\troubleshooting.twig");
    }
}
