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

require 'inc/bootstrap.php';
require 'inc/layout.php';

/* Página solicitada */
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

/* Mapa de páginas permitidas */
$routes = array(
    'home'    => 'home.php',
    'faq'     => 'faq.php',
    'contact' => 'contact.php'
);

/* Seguridad básica */
if (!isset($routes[$page])) {
    $page = 'home';
}

/* Cargar vista */
// $content = file_get_contents('views/' . $routes[$page]);
ob_start();
include 'views/' . $routes[$page];
$content = ob_get_clean();

/* Render final */
echo render_layout($html, $content);
