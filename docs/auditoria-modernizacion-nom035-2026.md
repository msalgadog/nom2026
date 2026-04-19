# Auditoria de Modernizacion NOM035 (2026)

## Objetivo

Actualizar el sistema legado NOM035 para hacerlo mantenible, seguro y estable sin reescritura total.

## Supuestos confirmados

- Hosting compartido.
- Runtime objetivo: PHP 8.4.19 y MariaDB 10.6.24.
- Mantener separacion por carpetas (home/humanoffice), pero unificar funciones y configuracion base.
- Prioridad inicial: upgrade de codigo para aprovechar capacidades de version nueva.

## Hallazgos criticos

### 1) Credenciales y configuracion hardcodeadas

- Hay credenciales de base de datos en codigo fuente en mas de un archivo.
- Se observan valores de URL base y base de datos embebidos.
- Riesgo: seguridad, despliegues fragiles por entorno, y configuracion inconsistente.

### 2) Configuracion duplicada (home y humanoffice)

- Existen rutas de configuracion con estilos diferentes para la misma conexion.
- Riesgo: cambios parciales, errores por drift entre modulos y mayor costo de soporte.

### 3) Filtros dinamicos JS/PHP altamente acoplados

- El flujo de filtros depende de multiples llamadas AJAX en cascada.
- Coexisten implementaciones similares en carpetas distintas con diferencias de contrato (GET vs POST).
- Riesgo: fallos intermitentes, mantenimiento lento y regresiones en reportes.

### 4) Alta presencia de SQL concatenado

- Se detectan consultas con concatenacion y uso extendido de mysqli_query sobre SQL armado dinamicamente.
- Riesgo: superficie de inyeccion SQL y errores de datos.

### 5) Duplicacion funcional y archivos de respaldo en produccion

- Hay carpetas paralelas (ej. seguimiento y seguimiento.1) y archivos original/bueno.
- Riesgo: confusion operativa, cambios en archivo equivocado y deuda tecnica acumulada.

## Plan de modernizacion por fases

### Fase 0 - Congelamiento controlado (1 semana)

- Definir rama de estabilizacion y checklist de funcionalidades criticas.
- Crear backup de BD y snapshot de archivos.
- Registrar flujo critico: login, encuesta, resultados, filtros, PDF, mapa.

### Fase 1 - Upgrade tecnico PHP 8.4 (1 a 2 semanas)

- Levantar lista de incompatibilidades y deprecaciones en flujo critico.
- Homologar manejo de errores y validaciones basicas en modulos principales.
- Asegurar compatibilidad con hosting compartido sin dependencias no soportadas.

### Fase 2 - Seguridad y configuracion (1 a 2 semanas)

- Centralizar configuracion en un solo punto (env + loader).
- Eliminar secretos del repo y parametrizar por entorno.
- Agregar validaciones de entrada en endpoints criticos.

### Fase 3 - Estabilizacion de filtros y reportes (2 a 3 semanas)

- Unificar contrato de filtros (solo POST o solo GET) con esquema claro.
- Consolidar una sola carpeta de endpoints de filtros.
- Agregar pruebas de humo para: compania -> grupo -> distrito -> localidad -> departamento.

### Fase 4 - Refactor incremental de datos (2 a 4 semanas)

- Introducir capa de acceso a datos en modulos de resultados/seguimiento.
- Migrar consultas sensibles a prepared statements.
- Reducir duplicidad de SQL repetido.

### Fase 5 - Limpieza estructural (1 a 2 semanas)

- Depurar archivos respaldo/duplicados fuera del runtime productivo.
- Normalizar nombres de carpetas y convenciones.
- Documentar arquitectura minima y mapa de dependencias.

## Backlog inicial sugerido (top 10)

1. Config unica con variables de entorno para DB y URL base.
2. Rotacion inmediata de credenciales expuestas.
3. Inventario de endpoints usados por filtros de reportes.
4. Unificacion de endpoints cargar_* en una sola ruta canonica.
5. Contrato unico de payload para filtros (parametros y defaults).
6. Remover salidas de debug en flujo de resultados.
7. Corregir includes/rutas con errores tipograficos en backoffice.
8. Blindar consultas de login y endpoints administrativos.
9. Crear smoke tests basicos de ruta feliz por modulo.
10. Definir criterio de deprecacion para seguimiento.1 y archivos *_original.

## Indicadores de exito

- 0 secretos en repo.
- 0 errores JS en flujo de filtros.
- Tiempo de generacion de reportes estable (< objetivo definido por negocio).
- Reduccion visible de archivos duplicados en runtime.
- Checklist funcional aprobado por negocio para home y humanoffice.
