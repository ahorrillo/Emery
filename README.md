# EMERY - Edición iMprEsa diaRio hoY 🚀

[![PHP](https://img.shields.io/badge/PHP-5.3-%23777bb3)](https://www.php.net/)
[![Coverage](https://img.shields.io/badge/Coverage-95%25-brightgreen)](https://github.com/ahorrillo)
[![License](https://img.shields.io/badge/License-Vocento-informational)](LICENSE)

Landing y microsite para Suscriptores de la Edición Impresa, desarrollado para entornos legacy con PHP 5.3, sin frameworks y con integración del skeleton corporativo de Voc.

## ✨ Objetivo

El objetivo del proyecto es ofrecer una solución:

* Ligera.
* Estable.
* Fácil de mantener.
* Compatible con servidores antiguos.
* Escalable sin dependencias externas.

---

## 🚀 Características

* PHP 5.3 compatible.
* Sin frameworks ni Composer.
* Front Controller con un único `index.php`.
* Integración con skeleton corporativo (cacheado).
* Sistema de vistas reutilizable.
* Menú común con estado activo automático.
* URLs limpias opcionales mediante `.htaccess`.
* Gestión clara de assets.
* Arquitectura pensada para entornos legacy.

---

## 📂 Estructura del Proyecto

```text
/
├── index.php          (Punto único de entrada / router)
├── inc/
│   ├── bootstrap.php  (Descarga y caché del skeleton)
│   ├── layout.php     (Inyección del contenido en el skeleton)
│   └── menu.php       (Menú común reutilizable)
├── views/
│   ├── home.php       (Inicio)
│   ├── faq.php        (Preguntas frecuentes)
│   └── contact.php    (Contacto / Atención al suscriptor)
├── assets/
│   ├── img/           (Imágenes)
│   ├── css/           (CSS propio, opcional)
│   └── js/            (JS propio, opcional)
├── cache/             (Caché del skeleton)
└── .htaccess          (URLs bonitas, opcional)
```

---

## ⚡ Funcionamiento General

### **Front Controller**

Todas las peticiones pasan por `index.php`, que decide qué vista cargar en función del parámetro `page`.

Ejemplos sin URLs limpias:

* `index.php`
* `index.php?page=faq`
* `index.php?page=contact`

Con URLs limpias (opcional):

* `/`
* `/faq`
* `/contacto`

### **Skeleton y Caché**

El skeleton corporativo se descarga desde la API correspondiente y se cachea durante 1 hora para reducir llamadas externas.

* Archivo responsable: `inc/bootstrap.php`
* Es posible forzar la recarga del skeleton usando: `?nocache=1`

### **Sistema de Vistas**

Las vistas viven en `/views` y pueden contener PHP, HTML, estilos y JavaScript.
Se cargan mediante `include` y *output buffering* para:

1. Ejecutar código PHP.
2. Generar HTML dinámico.
3. Inyectar el resultado dentro del skeleton.

### **Menú de Navegación**

El menú:

* Vive en `inc/menu.php`.
* Se incluye desde cada vista.
* Marca automáticamente la sección activa usando `$_GET['page']`.

Ejemplo de inclusión en una vista:

```php
<?php include __DIR__ . '/../inc/menu.php'; ?>
```

### **Assets**

Todos los assets públicos se alojan en la carpeta `/assets`.

Ejemplo de uso:

```php
<img src="/assets/img/slide1.jpg" alt="Suscriptores Edición Impresa">
```

Si el proyecto vive en una subcarpeta, se define una base común:

```php
$BASE_PATH = '/suscriptores';
```

### **URLs Bonitas (Opcional)**

Si el servidor tiene `mod_rewrite` activo, se pueden usar URLs limpias mediante `.htaccess`.

Configuración de ejemplo apache:

```bash
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} -f [OR]
RewriteCond %{REQUEST_FILENAME} -d
RewriteRule ^ - [L]

RewriteRule ^$ index.php [L,QSA]
RewriteRule ^faq/?$ index.php?page=faq [L,QSA]

RewriteRule ^contacto/?$ index.php?page=contact [L,QSA]
```

Si `.htaccess` no está disponible, el sistema sigue funcionando correctamente con `?page=`.

---

## 🛠 Requisitos

* PHP 5.3
* Servidor Apache
* `mod_rewrite` (solo si se usan URLs limpias)
* Acceso HTTP al endpoint del skeleton corporativo

---

## 🔁 Qué NO usa este proyecto

* Frameworks modernos
* Composer
* Namespaces
* Autoloaders
* Dependencias externas

Todo esto es intencionado para garantizar compatibilidad y estabilidad a largo plazo.

---

## 🗺️ Entorno Legacy Friendly

La arquitectura sigue patrones clásicos:

* `includes`
* Vistas simples
* Lógica mínima
* Separación clara de responsabilidades

Pensado para mantenimiento a largo plazo y servidores antiguos.

---

## ⚠️ Notas Finales

Para añadir una nueva página:

1. Crear una vista en `/views`
2. Añadir la ruta en `index.php`
3. (Opcional) añadir la regla correspondiente en `.htaccess`

La estructura facilita una futura migración a entornos más modernos sin reescribir el contenido.

---

## 👤 Autor

Desarrollado por **Antonio Horrillo Horrillo**.
<ahorrillo@hoy.es> | <tuanhorrillo@gmail.com> [GitHub](https://github.com/ahorrillo) | [LinkedIn](https://www.linkedin.com/in/antoniohh)

Proyecto creado y mantenido por Antonio Horrillo Horrillo, responsable de la arquitectura, desarrollo y diseño de Mapas.

---

## 📜 Licencia

-**Propiedad:** Grupo Vocento.
-**Licencia:** Privativa (uso interno).

Este proyecto es **software privativo** y propiedad del **Grupo Vocento**.
No está permitido su uso, copia, modificación o distribución sin autorización expresa de Vocento.

---
