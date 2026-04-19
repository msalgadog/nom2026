# Migración Humanoffice - Configuración Centralizada

## Estado: ✅ COMPLETADO

### Cambios Realizados

#### 1. **Actualización de humanoffice/funciones/config.php**

```diff
- $config = nom035_get_config('main');
+ $config = nom035_get_config('human');
```

**Impacto:** 
- Ahora humanoffice usa el perfil 'human' en lugar de 'main'
- Conecta a BD `cnom035` con usuario `cnom035` (antes era `nom2026` con `nom26_1`)
- Mantiene credenciales en php/config/shared.php (centralizado)

### Archivos Afectados por el Cambio

Todos estos archivos ahora usarán las credenciales correctas de humanoffice:

| Archivo | Ubicación | Uso |
|---------|-----------|-----|
| config.php | humanoffice/funciones/ | Define $usuario_bd, $password_ubd, etc |
| bdconect.php | humanoffice/funciones/ | Conexión mysqli |
| mainfile.php | humanoffice/funciones/ | Incluye config.php + bdconect.php |
| login.php | humanoffice/php/ | Usa mainfile.php via require |
| valida_admin.php | humanoffice/php/ | Usa mainfile.php via require |
| usuarios_catalogo.php | humanoffice/backoffice/funciones/querys/ | DataTables AJAX endpoint |
| anuncios.php | humanoffice/backoffice/funciones/querys/ | DataTables AJAX endpoint |
| usuarios_avance.php | humanoffice/backoffice/funciones/querys/ | DataTables AJAX endpoint |

### Estructura de Conexión

```
humanoffice/index.php
    → php/login.php
        → funciones/mainfile.php
            → funciones/config.php  [CAMBIO AQUÍ: 'main' → 'human']
            → funciones/bdconect.php
            → funciones/sqldata.php
        → conexión a BD: cnom035 (humanoffice database)
```

### Variables de Entorno Utilizadas

```bash
# Si se configura en hosting:
NOM035_DB_SERVER        # localhost (shared.php default)
NOM035_DB_USERNAME      # cnom035
NOM035_DB_PASSWORD      # CCnNMN*.*035 (debe rotarse antes de hosting)
NOM035_DB_DATABASE      # cnom035
NOM035_TIMEZONE         # America/Mexico_City
NOM035_DB_CHARSET       # utf8
```

### Validación

✅ **Sintaxis PHP:**
```
humanoffice/funciones/config.php         → OK
humanoffice/funciones/bdconect.php       → OK
php/config/human/db.php                  → OK
```

✅ **Estructura de Configuración:**
- config.php requiere shared.php ✓
- shared.php tiene nom035_get_config('human') ✓
- Fallbacks de seguridad implementados ✓
- Variables de entorno soportadas ✓

### Próximos Pasos en Hosting

1. **Opción A: Apache .htaccess** (Recomendado)
   ```apache
   SetEnv NOM035_DB_PASSWORD "new_humanoffice_pass"
   SetEnv NOM035_SMTP_PASS_DEFAULT "new_smtp_pass"
   ```

2. **Opción B: Archivo .env local**
   ```
   NOM035_DB_PASSWORD=new_humanoffice_pass
   NOM035_SMTP_PASS_DEFAULT=new_smtp_pass
   ```

3. **Validar con script de prueba**
   ```
   http://yoursite/php/config/test_connection.php
   → Debe mostrar: Connection Successful! (HUMAN profile)
   ```

### ⚠️ Consideraciones Importantes

1. **Base de Datos Separada:**
   - NOM035: usuario `nom26_1` en BD `nom2026`
   - Humanoffice: usuario `cnom035` en BD `cnom035`
   - Son bases de datos COMPLETAMENTE DIFERENTES

2. **Tablas Referenciadas:**
   - Humanoffice usa tabla `bf_auth_users` (autenticación)
   - Humanoffice usa tabla `anuncios` (anuncios/notices)
   - Humanoffice usa tabla `usuarios_avance` (seguimiento)
   - NO usa tablas de nom035_empleados directamente

3. **Credenciales a Rotar ANTES de Hosting:**
   - `cnom035` password: `CCnNMN*.*035` (DEBE CAMBIAR)
   - `nom26_1` password: `+DO+{qi}HxM7` (DEBE CAMBIAR)
   - SMTP passwords (4 credenciales)

### Testing Checklist

- [ ] Acceder a humanoffice/index.php → login page carga
- [ ] Intentar login con usuario válido → debe conectar a `bf_auth_users`
- [ ] Revisar admin panel → debe cargar tablas DataTables
- [ ] Ejecutar test_connection.php → HUMAN profile OK
- [ ] Revisar error_log por conexión errors

### Rollback (Si es necesario)

Si hay problema, revertir a:
```php
$config = nom035_get_config('main');
```

Pero esto causaría que humanoffice intente acceder a tablas de NOM035, lo cual no funcionará.

---

**Versión:** 2.0  
**Fecha:** 19 de abril, 2026  
**Estado:** Migración completada, Paso 3 (Variables de Entorno) Listo para Hosting
