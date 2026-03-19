# Deployment Instructions para Railway.app

## Prerrequisitos

- ✅ Dockerfile listo (en raíz del proyecto)
- ✅ railway.toml configurado (en raíz del proyecto)
- ✅ Repositorio en GitHub
- ✅ ubvwmzhw_onta_attendance.sql (para setup DB)
- Cuenta en [railway.app](https://railway.app) (gratis, solo requiere GitHub)

---

## Pasos Detallados

### A. Crear Proyecto en Railway desde GitHub

1. **Ir a railway.app**
   - Abre https://railway.app en navegador
   - Haz clic en **Login with GitHub**
   - Autoriza Railway a acceder a tus repositorios

2. **Crear nuevo proyecto**
   - Click en **New Project**
   - Selecciona **GitHub Repo**
   - Busca y selecciona: `roquv/onta_dev-main` (o como esté nombrado)
   - Railway detectará automáticamente el Dockerfile y railway.toml

3. **Esperando el deploy inicial**
   - Railway comenzará a construir la imagen Docker
   - Puedes ver logs en vivo en la pestaña **Deployments**
   - Este primer deploy fallará sin MySQL → esto es normal ✅

---

### B. Agregar MySQL Plugin

1. **En el dashboard de Railway (Project View)**
   - Haz clic en **+ New** (botón verde arriba a la derecha)
   - Selecciona **Database** → **MySQL**
   - Railway crea automáticamente:
     - Contenedor MySQL con credenciales aleatorias
     - Variables de entorno: `DATABASE_URL`, `MYSQL_HOST`, `MYSQL_USER`, `MYSQL_PASSWORD`, `MYSQL_DB`

2. **Verificar variables creadas**
   - Ve a la sección **Variables>** 
   - Deberías ver las variables MySQL auto-generadas
   - **No necesitas copiarlas manualmente** → Railway las inyecta automáticamente

---

### C. Configurar Variables de Entorno

Railway crea vars MySQL automáticamente, pero necesitas agregar las outras.

1. **En el panel del servicio PHP (tu Dockerfile)**
   - Ve a pestañas **Variables** (no Variables del MySQL)
   - Haz clic en **+ New Variable** y rellena:

| Variable | Valor |
|----------|-------|
| `DB_HOST` | `${{MYSQL.MYSQL_HOST}}` |
| `DB_USER` | `${{MYSQL.MYSQL_USER}}` |
| `DB_PASS` | `${{MYSQL.MYSQL_PASSWORD}}` |
| `DB_NAME` | `${{MYSQL.MYSQL_DB}}` |
| `QR_SECRET` | Cualquier string largo (ej: `QR_production_xyz123abc789`) |
| `APP_ENV` | `production` |
| `APP_URL` | `http://${{RAILWAY_PUBLIC_DOMAIN}}/` |
| `SITENAME` | `ONTA Asistencia QR` |
| `RECAPTCHA_SITE_KEY` | Tu clave real (si tienes) |
| `RECAPTCHA_SECRET_KEY` | Tu clave real (si tienes) |

**Notas importantes:**
- Las referencias `${{MYSQL.*}}` **resuelven automáticamente** a los valores del contenedor MySQL
- Si no tienes reCAPTCHA, deja vacíos (config.php usará fallbacks)
- `APP_URL` usa la variable dinámica `RAILWAY_PUBLIC_DOMAIN` (no valores hardcodeados)

---

### D. Ejecutar Script SQL

1. **Descargar credenciales genéricas**
   - En el panel del servicio MySQL, click en **Connect**
   - Opción 1: **Railway CLI** (terminal local)
   - Opción 2: **MySQL Workbench** (GUI)
   - Opción 3: **DBeaver** (IDE de BD)

2. **Método Recomendado: DBeaver (más fácil si no tienes CLI de MySQL)**

   a. Descarga [DBeaver Community](https://dbeaver.io/) (gratis)
   
   b. En Railway dashboard → MySQL service → **Connect** tab
      - Copia todas las credenciales (Host, Port, User, Password)
   
   c. En DBeaver:
      - `New Database Connection` → MySQL
      - Host: pega el valor de Railway
      - Port: 3306 (o el que especifique Railway)
      - User: pegaCredenciales
      - Password: pega Contraseña
      - Test Connection
   
   d. Abre archivo `ubvwmzhw_onta_attendance.sql`
   
   e. Copia todo el contenido y pégalo en una pestaña SQL New de DBeaver
   
   f. Ejecuta: Ctrl+Enter o click en ▶
   
   g. Verifica: En el árbol izquierdo → Database → ubvwmzhw_onta
      - Deberías ver tablas: `users` (modificada), `events`, `attendance`, `attendance_tokens`

3. **Método Alternativo: Railway CLI**

   ```bash
   # Instalar Railway CLI
   npm install -g @railway/cli
   
   # Loguear
   railway login
   
   # Seleccionar proyecto
   railway link
   
   # Ejecutar SQL
   railway database:shell < ubvwmzhw_onta_attendance.sql
   ```

---

### E. Verificar Deploy & Obtener URL Pública

1. **Esperar deploy exitoso**
   - Después de ejecutar el SQL, PHP service debería deployarse automáticamente
   - Si sigue fallando, revisa logs en **Deployments** tab
   - Espera 2-3 minutos para que se sincronice

2. **Obtener URL pública**
   - En el servicio PHP (tu app) → pestaña **Settings**
   - Copia el valor bajo **Domains** (ej: `https://onta-prod-abc123.railway.app`)
   - Esta URL se usará en Flutter config.dart

3. **Pruebas rápidas**

   a. **Ver página principal**
      ```
      https://[tu-url]/
      ```
      Deberías ver la página de inicio de ONTA

   b. **Probar login de admin**
      ```
      https://[tu-url]/users/login
      ```
      Usuario: admin@onta.com (creado por SQL anterior)

   c. **Probar endpoint API**
      ```bash
      curl -X POST https://[tu-url]/api/token \
        -H "Content-Type: application/json" \
        -d '{"email":"admin@onta.com","password":"password"}'
      ```
      Respuesta esperada: `{"status": "error", "token": null}` o `{"status": "ok", "token": "xyz..."}`
      (Depende si el usuario/contraseña son correctos en tu BD)

---

## Configuración en Flutter

Una vez que Railway esté listo:

1. **Obtén tu URL pública** de Railway (Paso E.2)

2. **Actualiza lib/config.dart**
   ```dart
   class ApiConfig {
     static const String baseUrl = 'https://[tu-url-railway]/api/';
   }
   ```

3. **APK puede ahora usar produción** en lugar de localhost:8000

---

## Troubleshooting

| Síntoma | Causa | Solución |
|---------|-------|----------|
| Deploy inicial falla | Sin MySQL | Agregar MySQL plugin (Paso B) |
| PHP conecta pero error BD | Vars de entorno vacías o incorrectas | Revisar referencias `${{MYSQL.*}}` |
| SQL falla con "user already exists" | Datos duplicados | OK - `CREATE TABLE IF NOT EXISTS` maneja esto |
| 404 en rutas (excepto raíz) | mod_rewrite no activo | Dockerfile ya lo activa (`a2enmod rewrite`) |
| CORS error en Flutter | Headers falta | Api.php ya envía `Access-Control-Allow-Origin: *` |
| QR no genera | Composer dependencies falta | Dockerfile corre `composer install` |

---

## Archivo Checklist

Antes de deployar, verifica que estos archivos existan en raíz:

- ✅ Dockerfile
- ✅ railway.toml
- ✅ composer.json
- ✅ config/config.php (con getenv() calls)
- ✅ config/qr_config.php (con getenv() calls)
- ✅ ubvwmzhw_onta_attendance.sql
- ✅ app/ (carpeta completa con todos los controllers/models/views)

---

## URLs Útiles

- **Railway Dashboard**: https://railway.app/dashboard
- **Tu Proyecto**: https://railway.app/project/[id] (visible en dashboard)
- **MySQL Service Logs**: Click en servicio MySQL → Deployments
- **PHP Service Logs**: Click en PHP service → Deployments

---

## Próximos Pasos (Fase 7)

Una vez que Railway esté en vivo:

1. Crear Flutter app (lib/main.dart, screens, api_service)
2. Configurar mobile_scanner para capturar QR
3. Enviar tokens vía POST /api/scan
4. Desplegar APK a Google Play Store (opcional)

**✅ Deployment listo para comenzar** 🚀
