# 🔧 Comandos de Validación Post-Deployment

## Para Ejecutar en Hosting después de Desplegar

### 1. Validar Sintaxis de Todos los Archivos Modernizados

```bash
# Reportes Core (4 archivos)
php -l resultados/resultados_nom035.php
php -l resultados/resultados_nom035_pdf.php
php -l resultados/resultados_nom035_filtros.php
php -l php/login.php

# Reportes Secundarios Web (3 archivos)
php -l resultados/resultados_categorias.php
php -l resultados/resultados_dominio.php
php -l resultados/resultados_localidad.php

# Reportes Secundarios PDF (3 archivos)
php -l resultados/resultados_categorias_pdf.php
php -l resultados/resultados_dominios_pdf.php
php -l resultados/resultados_localidad_pdf.php

# Endpoints Filtros GET (4 archivos)
php -l resultados/functions/cargar_distritos.php
php -l resultados/functions/cargar_dpto.php
php -l resultados/functions/cargar_grupo.php
php -l resultados/functions/cargar_localidad.php

# Endpoints Filtros POST (4 archivos)
php -l resultados/funciones/cargar_distritos.php
php -l resultados/funciones/cargar_grupos.php
php -l resultados/funciones/cargar_localidad.php
php -l resultados/funciones/cargar_departamento.php

# Otros Módulos (13 archivos)
php -l nom.php
php -l demograficos.php
php -l semaforo.php
php -l resultados/resultados_cat_filtro.php
php -l resultados/cat_filtros_panel1.php
php -l resultados/cat_filtros_panel1_pdf.php
php -l resultados/cat_filtros_panel2.php
php -l resultados/cat_filtros_panel2_pdf.php
php -l resultados/cat_filtros_panel3.php
php -l resultados/cat_filtros_panel3_pdf.php
php -l seguimiento.1/php/librerias/listado_planes_accion.php
php -l seguimiento.1/php/librerias/form_agrega_planes.php
php -l seguimiento.1/php/librerias/form_agrega_actividad.php

# Configuración (4 archivos)
php -l php/config/shared.php
php -l php/config/db.php
php -l php/config/human/db.php
php -l humanoffice/funciones/config.php
```

### 2. Validar Conexión a Base de Datos

Acceder vía navegador:
```
http://www.humanpro.com.mx/nom035/php/config/test_connection.php
```

**Debe mostrar:**
```
✓ Connection Successful! (para ambos profiles: main y human)
Environment: PRODUCTION
```

### 3. Validar Configuración SMTP

Acceder vía navegador:
```
http://www.humanpro.com.mx/nom035/php/config/test_smtp.php
```

**Debe mostrar:**
```
Profile: DEFAULT → Configuration OK
Profile: BUZONES → Configuration OK
Profile: HUMANNOM → Configuration OK
```

### 4. Validar Login NOM035

```
http://www.humanpro.com.mx/nom035/index.php
→ Ingresar usuario/contraseña válidos
→ Debe redirigir a home.php exitosamente
```

### 5. Validar Humanoffice Login

```
http://www.humanpro.com.mx/nom035/humanoffice/index.php
→ Ingresar usuario/contraseña humanoffice
→ Debe redirigir a backoffice/dashboard.php
```

### 6. Revisar Error Logs

```bash
# Ver últimos errores
tail -50 error_log
tail -50 nom.php.errors
tail -50 php/error_log
tail -50 humanoffice/error_log
tail -50 resultados/error_log

# Buscar errores de conexión
grep -i "connection\|mysql\|database" error_log | tail -20

# Buscar errores de credenciales
grep -i "authentication\|password\|access denied" error_log | tail -20
```

### 7. Validar GET Parameters Escaping

**Test XSS Prevention:**

```
# Intentar inyectar XSS - DEBE SER ESCAPADO
http://www.humanpro.com.mx/nom035/nom.php?b=<script>alert(1)</script>
→ Script debe ser visible como texto, no ejecutarse

# Intentar inyectar en compa
http://www.humanpro.com.mx/nom035/semaforo.php?localidad="><script>alert(1)</script>
→ Script debe ser escapado en href
```

### 8. Validar SMTP Funcionality

```bash
# Buscar enviados de correos exitosos
grep -i "mail sent\|send\|success" error_log | tail -10

# Probar envío manual (si tiene interfaz)
# Ir a: Buzón de quejas y sugerencias
# Enviar mensaje → Debe recibirse en email
```

### 9. Revisar Variables de Entorno

```bash
# Si usa .htaccess
grep "SetEnv" .htaccess | head -20

# Si usa php.ini
grep "NOM035" php.ini | head -20

# Verificar que se cargan en PHP
php -r "var_dump(getenv('NOM035_DB_SERVER'));"
```

### 10. Validar .gitignore Está Protegiendo Archivos Sensibles

```bash
# Verificar que .env NO está en git
git ls-files | grep ".env"
# Debe estar vacío

# Verificar que .gitignore protege
cat .gitignore | grep -E ".env|pw.php|test_"
# Debe mostrar estas líneas
```

---

## 🚨 Si Hay Problemas

### Error: "Connection Failed to Database"

**Checklist:**
1. Verificar variables de entorno están seteadas:
   ```bash
   echo $NOM035_DB_PASSWORD
   echo $NOM035_DB_USERNAME
   ```

2. Verificar credenciales son correctas (no mezcladas entre main/human)

3. Revisar error_log específico:
   ```bash
   tail -100 php/error_log
   ```

4. Test con script test_connection.php

### Error: "SMTP Failed to Send"

**Checklist:**
1. Verificar puerto SMTP (465 para SSL, 587 para TLS)
2. Verificar variables SMTP están seteadas
3. Revisar error_log para mensajes SMTP
4. Test con script test_smtp.php

### Error: "Access Denied" en Humanoffice

**Checklist:**
1. Verificar que config.php usa `nom035_get_config('human')` ✅
2. Verificar tabla `bf_auth_users` existe en BD cnom035
3. Verificar usuario/contraseña en tabla son correctos
4. Revisar error_log de humanoffice

### Rendimiento Lento

**Checklist:**
1. Las helper functions nom035_h() son inline (no ralentizan)
2. Verificar escaping no está ocurriendo 2x
3. Revisar si hay query loops innecesarios
4. Monitorear uso de BD

---

## ✅ Checklist Final Pre-Go Live

- [ ] Todos los php -l pasaron sin errores
- [ ] test_connection.php muestra ✓ OK para main y human
- [ ] test_smtp.php muestra ✓ OK para todos los profiles
- [ ] Login NOM035 funciona
- [ ] Login Humanoffice funciona
- [ ] Reportes generan correctamente
- [ ] SMTP envia emails (prueba con buzón)
- [ ] No hay errores de conexión en error_log
- [ ] Variables de entorno están en hosting
- [ ] .env no está en git
- [ ] pw.php fue removido
- [ ] test_*.php fueron removidos (o protegidos)
- [ ] Documentación fue actualizada
- [ ] Backup fue realizado
- [ ] Credenciales fueron rotadas

---

## 📞 Soporte Rápido

| Problema | Solución Rápida |
|----------|-----------------|
| XSS test falla | Verificar nom035_h() está en archivo |
| SQL error | Verificar mysqli_real_escape_string() |
| 500 error | Ver error_log más reciente |
| Login falla | Verificar profile correcto ('main' vs 'human') |
| SMTP falla | Verificar puertos y credenciales |

---

**Versión:** 2.0  
**Generado:** 19 de abril, 2026  
**Documentación:** COMPLETA
