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

$cache_file = __DIR__ . '/../cache/plantilla_cache.html';
$cache_time = 3600;

$force_reload = isset($_GET['nocache']);

$BASE_PATH = '/suscripciones/papel';

if (
    !$force_reload &&
    file_exists($cache_file) &&
    (time() - filemtime($cache_file) < $cache_time)
) {
    $html = file_get_contents($cache_file);
} else {
    $url = 'https://www.hoy.es/api/v2/headers/skeleton.html?type=responsive22&section=badajoz';
    $html = @file_get_contents($url);

    if ($html !== false) {
        if (!is_dir(dirname($cache_file))) {
            mkdir(dirname($cache_file), 0755, true);
        }
        file_put_contents($cache_file, $html);
    } elseif (file_exists($cache_file)) {
        $html = file_get_contents($cache_file);
    } else {
        $html = '<html><body>Error temporal</body></html>';
    }
}
