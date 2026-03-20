# PROMPT - PWA ESCÁNER QR (Flutter - Staff)

## CONTEXTO TÉCNICO

**Backend:** Node.js + Express (MySQL)  
**API Base:** `http://localhost:3000` para desarrollo local por el momento
**Framework:** Flutter (Android Studio)  
**Objetivo:** App minimalista para validar QR y registrar asistencia

---

## ESPECIFICACIONES TÉCNICAS

### Endpoints Backend
- **POST** `/attendance/scan` → Valida QR y registra asistencia
  - Request: `{ "token": "jwt_token_del_qr" }`
  - Response: Éxito (201) | Error (400/401/403/409)
  - Payload JWT: `{ user_id, event_id, timestamp, iat }`
  - Expiración: 5 min

**Respuestas esperadas:**
```json
// Éxito (201)
{ "success": true, "message": "Asistencia registrada", "data": { "user_name": "Juan", "user_id": 1 } }

// Errores:
// 400: Usuario no existe / Sin inscripción  
// 403: Pago no verificado
// 409: Asistencia duplicada
// 401: Token inválido/expirado
```

---

## FUNCIONALIDADES REQUERIDAS

### 1. Escáner QR
- Plugin: `qr_code_scanner` o `google_ml_kit`
- Capturar JWT del código QR
- Detectar automáticamente y enviar al backend

### 2. Validación & Registro
- POST `/attendance/scan` con token
- Mostrar resultado en tiempo real
- Manejo de errores por código HTTP

### 3. Historial Sesión
- Último: Usuario + Hora de escaneo
- Contador: Total escaneado en sesión
- Limpiar al cambiar evento

### 4. Selección Evento (Opcional)
- Input evento_id si es requerido
- Almacenar en memoria de sesión

---

## DISEÑO UI/UX

### Paleta de Colores
- **Primario:** #1F3A93 (Azul formal)
- **Secundario:** #2E7D32 (Verde éxito)
- **Error:** #C62828 (Rojo)
- **Fondo:** #F5F5F5 (Gris claro)
- **Texto:** #212121 (Gris oscuro)

### Estructura Pantalla Principal
```
┌─────────────────────────────────┐
│    ESCÁNER - EVENTO [ID]        │  ← Header
├─────────────────────────────────┤
│                                 │
│     ┌─────────────────────┐     │
│     │   CÁMARA QR         │     │  ← QR Preview (250x250)
│     │   [Active/Scanning] │     │
│     └─────────────────────┘     │
│                                 │
│    ✓ Último: Juan (14:23)       │  ← Status Card
│    Total: 23 escaneos           │
│                                 │
│   ┌──────────────┐              │
│   │ [Resultado]  │              │  ← Result Card (dinámico)
│   └──────────────┘              │
│                                 │
│   ┌──────────────────────────┐  │
│   │   Selector Evento (ID)   │  │  ← Input evento_id
│   │   [ __________ ]         │  │
│   └──────────────────────────┘  │
│                                 │
│   [Reiniciar] [Salir]           │  ← Botones secundarios
└─────────────────────────────────┘
```

### Componentes
- **QR Preview:** Centrado, 250x250px, borde formalsuma
- **Result Card:** Ancho completo, animación fade-in (200ms)
- **Status Counters:** Fuente monoespacio, verde/rojo dinámico
- **Inputs:** Sin borde, fondo blanco, sombra leve
- **Botones:** Material Design, ripple effect

### Estados Visuales
```
ÉXITO (Verde):
  ✓ Asistencia registrada
  Usuario: [name]
  Hora: [timestamp]
  → Auto-limpiar en 2s

ERROR (Rojo):
  ✗ [Mensaje error]
  Código: [HTTP status]
  → Mantener hasta nuevo escaneo

ESCANEANDO (Azul):
  ⊙ Cámara activa...
```

---

## REQUISITOS FUNCIONALES

✅ Conexión HTTP a `localhost:3000`  
✅ Captura de JWT desde código QR  
✅ Envío token al backend  
✅ Parsear y mostrar respuesta  
✅ Historial sesión (última lectura + contador)  
✅ Selector evento_id editable  
✅ Sin estado persistente (solo sesión en memoria)  
✅ Manejo offline (mensaje: "Sin conexión")  

---

## REQUISITOS NO FUNCIONALES

- **Performance:** <500ms validación (red + parse + UI)
- **Accesibilidad:** Contraste WCAG AA
- **Responsividad:** Optimizado para 5-7"
- **Minimalismo:** <4 componentes visibles simultáneamente
- **Estabilidad:** Try-catch en requests HTTP
- **Logs:** Console.log errores, sin logs en prod

---

## ESTRUCTURA ARQUIVOS FLUTTER

```
lib/
├── main.dart                    # App entry + tema
├── screens/
│   └── scanner_screen.dart      # Pantalla principal
├── services/
│   └── api_service.dart         # HTTP client
├── models/
│   └── attendance_response.dart  # DTOs
└── widgets/
    ├── qr_preview.dart
    ├── result_card.dart
    └── status_counter.dart
```

---

## DEPENDENCIAS

```yaml
dependencies:
  flutter:
    sdk: flutter
  qr_code_scanner: ^1.0.0
  http: ^1.2.0
  provider: ^6.0.0
```

---

## NOTAS IMPLEMENTACIÓN

1. **Timeout:** 5s en requests HTTP
2. **Token parsing:** Usar `package:dart_jwt` (optional)
3. **Cámara:** Solicitar permisos en `AndroidManifest.xml`
4. **IP local:** Usar `10.0.2.2` en emulador Android (en lugar de localhost)
5. **CORS:** Ya habilitado en backend
6. **Rekindling error:** Capturar excepción si cámara no disponible

---

## TESTING MANUAL

```bash
# 1. Generar QR (desde backend)
curl -X POST http://localhost:3000/qr/generate \
  -H "Content-Type: application/json" \
  -d '{"user_id":1,"event_id":100}'

# 2. Escanear en app → Validación automática
# 3. Ver resultado en pantalla
```

---

## CÓMO EJECUTAR EL PROYECTO

Sigue estos pasos para poner en marcha la aplicación y probarla localmente:

### 1. Requisitos Previos
- Tener instalado **Flutter** y **Dart**.
- Tener el **Backend** (Node.js/Express) configurado y corriendo en el puerto 3000.
- Si usas el Emulador de Android, el backend se conectará automáticamente a `10.0.2.2:3000`.

### 2. Configuración del Backend
Asegúrate de que tu servidor esté activo:
```bash
# En la carpeta del backend
npm start
```

### 3. Ejecución de la App Flutter
Desde la raíz de este proyecto (`/scan`):
```bash
# 1. Obtener dependencias
flutter pub get

# 2. Conectar dispositivo o iniciar emulador

# 3. Ejecutar la app
flutter run
```

### 4. Prueba del Escáner
1. Genera un token JWT de prueba (usando el endpoint del backend mencionado arriba).
2. Convierte ese token en un código QR (puedes usar generadores online como [the-qrcode-generator.com](https://www.the-qrcode-generator.com/)).
3. Escanea el código con la cámara de la app.
4. Deberías ver el **Result Card** verde con el nombre del usuario y el contador incrementándose.

---
*Desarrollado con ❤️ para Unap Staff.*
