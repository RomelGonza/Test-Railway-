<?php
// Vista de QR de Asistencia
// Requiere: $event, $token, $has_attended

// Si no hay evento activo, mostrar aviso
if (!$event): ?>
    <div style="background: #fff3cd; border: 1px solid #ffc107; border-radius: 8px; padding: 20px; margin-bottom: 20px; color: #856404;">
        <i class="fa-solid fa-exclamation-triangle"></i>
        <strong>No hay evento activo actualmente</strong>
        <p style="margin: 0.5rem 0 0;">Ponte en contacto con los organizadores para más información.</p>
    </div>
<?php else: ?>
    <div style="background: #fff; border-radius: 18px; padding: 30px; box-shadow: 0 8px 30px rgba(26,22,37,0.10); max-width: 500px; margin: 20px auto; text-align: center;">
        
        <!-- Encabezado -->
        <div style="margin-bottom: 25px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0;">
            <h3 style="margin: 0 0 0.5rem; color: #1a1625; font-size: 1.25rem;">
                <i class="fa-solid fa-ticket"></i> Mi Código QR
            </h3>
            <p style="margin: 0; color: #6b7280; font-size: 0.9rem;">
                <?php echo htmlspecialchars($event->name); ?>
            </p>
            <p style="margin: 0.5rem 0 0; color: #6b7280; font-size: 0.85rem;">
                📅 <?php echo date('d/m/Y', strtotime($event->event_date)); ?>
            </p>
        </div>

        <!-- Estado Badge -->
        <div style="margin-bottom: 25px;">
            <?php if ($has_attended): ?>
                <div style="display: inline-block; background: #10b981; color: #fff; padding: 8px 16px; border-radius: 20px; font-size: 0.9rem;">
                    <i class="fa-solid fa-check-circle"></i> Asistencia Registrada
                </div>
            <?php else: ?>
                <div style="display: inline-block; background: #d1d5db; color: #374151; padding: 8px 16px; border-radius: 20px; font-size: 0.9rem;">
                    <i class="fa-solid fa-clock"></i> Pendiente
                </div>
            <?php endif; ?>
        </div>

        <!-- Imagen QR -->
        <div style="margin: 25px 0; background: #f9fafb; border: 3px dashed #e5e7eb; border-radius: 12px; padding: 20px; display: flex; align-items: center; justify-content: center;">
            <img id="qr-image"
                 src="<?php echo URLROOT; ?>/api/qr" 
                 alt="Código QR"
                 style="max-width: 300px; display: block; image-rendering: pixelated;"
                 onload="console.log('QR loaded')"
                 onerror="console.error('Failed to load QR')">
        </div>

        <!-- Botón Actualizar -->
        <button onclick="updateQR()" 
                style="background: #C41E5A; color: #fff; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600; font-size: 0.9rem; cursor: pointer; transition: all 0.3s ease;">
            <i class="fa-solid fa-arrows-rotate"></i> Actualizar QR
        </button>

        <!-- Información -->
        <div style="margin-top: 25px; padding-top: 20px; border-top: 2px solid #f0f0f0; text-align: left; font-size: 0.85rem; color: #6b7280;">
            <p style="margin: 0.5rem 0;"><strong>ℹ️ Información Importante:</strong></p>
            <ul style="margin: 10px 0 0 20px; padding: 0;">
                <li>Muestra este código al escaneador para registrar tu asistencia</li>
                <li>Expira en <?php echo QR_EXPIRES_HOURS; ?> horas desde su generación</li>
                <li>Se regenera automáticamente al actualizar</li>
            </ul>
        </div>

    </div>

    <script>
    function updateQR() {
        const img = document.getElementById('qr-image');
        const timestamp = new Date().getTime();
        img.src = '<?php echo URLROOT; ?>/api/qr?t=' + timestamp;
    }
    </script>

<?php endif; ?>
