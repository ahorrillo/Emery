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

function render_layout($html, $content) {
    return preg_replace(
        '/<!-- block content -->.*?<!-- endblock content -->/s',
        $content,
        $html
    );
}
