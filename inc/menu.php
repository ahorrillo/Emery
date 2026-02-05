<?php
/*
 * EMERY - Edición iMprEsa diaRio hoY
 *
 * Copyright (c) 2025 Vocento Diario HOY <ahorrillo@hoy.es>
 * Todos los derechos reservados.
 *
 * Este software es propiedad de HOY del Grupo Vocento y está protegido por las leyes de propiedad intelectual.
 * Queda prohibida su copia, distribución o modificación sin autorización expresa y por escrito.
 */

$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
global $BASE_PATH;

function menu_active($page) {
    global $current_page;
    return ($current_page === $page) ? 'is-active' : '';
}
?>

<nav class="v-m-und__nav v-sld__c">
    <div class="v-sld__w">
      <ul class="v-m-und__list v-sld__g">
        <li class="v-m-und__item <?php echo menu_active('home'); ?> v-sld__s">
          <a class="v-m-und__link" href="<?php echo $BASE_PATH; ?>/">Inicio</a>
        </li>
        <li class="v-m-und__item <?php echo menu_active('faq'); ?> v-sld__s">
          <a class="v-m-und__link" href="<?php echo $BASE_PATH; ?>/faq"">Preguntas Frecuentes</a>
        </li>
        <li class="v-m-und__item <?php echo menu_active('contact'); ?> v-sld__s">
          <a class="v-m-und__link" href="<?php echo $BASE_PATH; ?>/contacto">Contactar</a>
        </li>
      </ul>
    </div>
</nav>
