# Guía de Migración NOM-035 v2.0 - Seguridad y Configuración

## 📋 Resumen Ejecutivo

Esta guía documenta el proceso de modernización del sistema NOM-035 hacia PHP 8.4, incluida la seguridad y consolidación de configuración.

### Fases Completadas
- ✅ **Fase 1-5 (18 archivos):** Refactorización XSS/input validation en módulo reportes
- ✅ **Paso 1 (13 archivos):** Refactorización XSS en módulos: encuesta, demografía, semáforo, categorías, seguimiento
- ✅ **Paso 2 (Estructura):** Configuración centralizada DB y SMTP
- 🔄 **Paso 3 (Próximo):** Migración a variables de entorno

---

## 🔐 Seguridad - Credenciales Identificadas

### Base de Datos
Todas las credenciales ya están **centralizadas** en `php/config/shared.php`:

| Perfil | Usuario | BD | Ubicación |
|--------|---------|----|----|
| main | nom26_1 | nom2026 | php/config/shared.php |
| human | cnom035 | cnom035 | php/config/shared.php |

### SMTP/Email  
Credenciales **descubiertas y consolidadas** en `php/config/shared.php`:

| Perfil | Email | Ubicación Original |
|--------|-------|------------------|
| default | amurphy@humanpro.com.mx | comunidad/send_buzon.php (línea 256-257) |
| buzones | nom35@humanpro.page | comunidad/buzon.php, buzon1.php |
| humannom | humannom035@gmail.com | comunidad/phpMailer/sendmail.php |

---

## 🚀 Cómo Implementar en Hosting

### Opción 1: Apache Environment (Recomendado)

Crear archivo `.htaccess` en raíz:

```apache
SetEnv NOM035_TIMEZONE "America/Mexico_City"
SetEnv NOM035_DB_CHARSET "utf8"

# Database - Main
SetEnv NOM035_DB_SERVER "localhost"
SetEnv NOM035_DB_USERNAME "nom26_1"
SetEnv NOM035_DB_PASSWORD "YOUR_NEW_SECURE_PASSWORD"
SetEnv NOM035_DB_DATABASE "nom2026"

# SMTP - Default
SetEnv NOM035_SMTP_HOST_DEFAULT "smtpout.secureserver.net"
SetEnv NOM035_SMTP_PORT_DEFAULT "465"
SetEnv NOM035_SMTP_SECURE_DEFAULT "ssl"
SetEnv NOM035_SMTP_USER_DEFAULT "your-email@domain.com"
SetEnv NOM035_SMTP_PASS_DEFAULT "YOUR_NEW_PASSWORD"
```

### Opción 2: PHP ini (Si .htaccess no funciona)

Crear `php/config/.env.php`:

```php
<?php
putenv('NOM035_DB_SERVER=localhost');
putenv('NOM035_DB_USERNAME=nom26_1');
putenv('NOM035_DB_PASSWORD=YOUR_NEW_PASSWORD');
// ... más variables
```

### Opción 3: Docker/cPanel

En panel de control, agregar variables de entorno (si soporta):
```
NOM035_DB_PASSWORD = <new-password>
NOM035_SMTP_PASS_DEFAULT = <new-password>
```

---

## 📝 Checklist de Migración

### Pre-migración
- [ ] Generar nuevas contraseñas seguras (mínimo 16 caracteres)
- [ ] Coordinar con proveedor hosting
- [ ] Hacer backup completo de base de datos
- [ ] Hacer backup de archivo actual de configuración

### Migración
1. [ ] Copiar `.env.example` a `.env` (no commitar a git)
2. [ ] Actualizar contraseñas en `.env`
3. [ ] Añadir `.env` a `.gitignore`
4. [ ] Implementar una de las opciones de entorno arriba
5. [ ] Probar conexión a BD: `php/test_connection.php` (crear si no existe)
6. [ ] Probar SMTP: `php/test_smtp.php` (crear si no existe)

### Post-migración
- [ ] Validar que todas las páginas cargan sin errores
- [ ] Verificar que los formularios envían correos
- [ ] Revisar logs de error en `error_log` files
- [ ] Documentar cambios en tu wiki/docs

---

## 🔧 Archivos Modificados

### Fase 1-5: Reportes (18 archivos)
```
✅ resultados/resultados_nom035.php
✅ resultados/resultados_nom035_pdf.php
✅ resultados/resultados_nom035_filtros.php
✅ php/login.php
✅ resultados/resultados_categorias.php
✅ resultados/resultados_dominio.php
✅ resultados/resultados_localidad.php
✅ resultados/resultados_categorias_pdf.php
✅ resultados/resultados_dominios_pdf.php
✅ resultados/resultados_localidad_pdf.php
✅ resultados/functions/cargar_distritos.php
✅ resultados/functions/cargar_dpto.php
✅ resultados/functions/cargar_grupo.php
✅ resultados/functions/cargar_localidad.php
✅ resultados/funciones/cargar_distritos.php
✅ resultados/funciones/cargar_grupos.php
✅ resultados/funciones/cargar_localidad.php
✅ resultados/funciones/cargar_departamento.php
```

### Paso 1: Otros Módulos (13 archivos)
```
✅ nom.php
✅ demograficos.php
✅ semaforo.php
✅ resultados/resultados_cat_filtro.php
✅ resultados/cat_filtros_panel1.php
✅ resultados/cat_filtros_panel1_pdf.php
✅ resultados/cat_filtros_panel2.php
✅ resultados/cat_filtros_panel2_pdf.php
✅ resultados/cat_filtros_panel3.php
✅ resultados/cat_filtros_panel3_pdf.php
✅ seguimiento.1/php/librerias/listado_planes_accion.php
✅ seguimiento.1/php/librerias/form_agrega_planes.php
✅ seguimiento.1/php/librerias/form_agrega_actividad.php
```

### Paso 2: Configuración
```
✅ php/config/shared.php (ACTUALIZADO con nom035_get_smtp_config)
✅ .env.example (NUEVO - template de variables)
```

---

## 📊 Patrón de Refactorización Utilizado

Todos los archivos siguen este patrón seguro:

```php
<?php
// 1. Helper function para escaping HTML
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

// 2. Saneo de parámetros GET/POST
$paramName = trim((string) ($_GET['param'] ?? ''));

// 3. Validación en output
echo '<input value="' . nom035_h($paramName) . '">';

// 4. SQL injection prevention (en queries)
$where = "WHERE field = '" . mysqli_real_escape_string($conn, $value) . "'";
```

**Beneficios:**
- ✅ Previene XSS attacks
- ✅ Previene SQL injection
- ✅ Compatible con PHP 8.4
- ✅ Cero cambios de lógica de negocio
- ✅ Reproducible y consistente

---

## ❓ FAQ

**P: ¿Por qué centralizar SMTP si ya está en shared.php?**
R: Porque las 4 credenciales SMTP están hardcodeadas en 5 archivos diferentes. Centralizar permite cambiarlas en un solo lugar.

**P: ¿Necesito cambiar el código de mis apps?**
R: No para Fase 1-5. Paso 1 ya está listo. Paso 2 solo requiere archivos de configuración.

**P: ¿Qué pasa si no configuro variables de entorno?**
R: Los fallbacks en `shared.php` usarán los valores por defecto hardcodeados (estado actual). No rompe nada, pero mantendrá credenciales visibles.

**P: ¿Es seguro usar .htaccess?**
R: Sí, pero solo si está fuera de document root. En shared hosting con acceso a cPanel, .htaccess es la forma estándar.

---

## 📞 Soporte

Para preguntas o issues:
1. Revisar error_log files en cada carpeta
2. Validar sintaxis: `php -l nombrefile.php`
3. Probar conexiones: Crear scripts test_connection.php y test_smtp.php

---

**Versión:** 2.0 PHP 8.4 Modernization  
**Fecha:** 19 de abril, 2026  
**Estado:** Pasos 1-2 Completados, Paso 3 Listo para Implementar
