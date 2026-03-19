<?php
// Vista de Tabla de Asistentes (Admin)
// Requiere: $event, $attendances

?>

<div style="background: #fff; border-radius: 18px; padding: 30px; box-shadow: 0 8px 30px rgba(26,22,37,0.10);">

    <!-- Encabezado -->
    <div style="margin-bottom: 30px; padding-bottom: 20px; border-bottom: 2px solid #f0f0f0;">
        <h3 style="margin: 0 0 0.5rem; color: #1a1625; font-size: 1.25rem;">
            <i class="fa-solid fa-list-check"></i> Registro de Asistencia
        </h3>
        <?php if ($event): ?>
            <p style="margin: 0; color: #6b7280; font-size: 0.9rem;">
                📅 <?php echo htmlspecialchars($event->name); ?> — <?php echo date('d/m/Y', strtotime($event->event_date)); ?>
            </p>
        <?php else: ?>
            <p style="margin: 0; color: #6b7280; font-size: 0.9rem;">
                <i class="fa-solid fa-exclamation-triangle"></i> No hay evento activo
            </p>
        <?php endif; ?>
    </div>

    <!-- Contador de asistentes -->
    <div style="margin-bottom: 25px; padding: 15px; background: #f0f9ff; border-left: 4px solid #0e7490; border-radius: 8px;">
        <strong style="color: #0e7490; font-size: 1.1rem;">
            Total de Asistentes: <?php echo count($attendances); ?>
        </strong>
    </div>

    <!-- Tabla -->
    <?php if (empty($attendances)): ?>
        <div style="text-align: center; padding: 40px 20px; color: #6b7280;">
            <i class="fa-solid fa-inbox" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
            <p>No hay registros de asistencia aún.</p>
        </div>
    <?php else: ?>
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.9rem;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 2px solid #e5e7eb;">
                        <th style="padding: 15px; text-align: left; color: #6b7280; font-weight: 600;">#</th>
                        <th style="padding: 15px; text-align: left; color: #6b7280; font-weight: 600;">Nombre</th>
                        <th style="padding: 15px; text-align: left; color: #6b7280; font-weight: 600;">Email</th>
                        <th style="padding: 15px; text-align: left; color: #6b7280; font-weight: 600;">Hora de Escaneo</th>
                        <th style="padding: 15px; text-align: left; color: #6b7280; font-weight: 600;">Escaneado Por</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $counter = 1;
                    foreach ($attendances as $record): 
                    ?>
                        <tr style="border-bottom: 1px solid #e5e7eb; transition: background 0.2s ease;" 
                            onmouseover="this.style.background='#f9fafb'" 
                            onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px; color: #6b7280;"><?php echo $counter++; ?></td>
                            <td style="padding: 15px; font-weight: 500; color: #1a1625;">
                                <?php echo htmlspecialchars($record->name); ?>
                            </td>
                            <td style="padding: 15px; color: #6b7280;">
                                <?php echo htmlspecialchars($record->email); ?>
                            </td>
                            <td style="padding: 15px; color: #6b7280; font-size: 0.85rem;">
                                <?php echo date('d/m/Y H:i', strtotime($record->scanned_at)); ?>
                            </td>
                            <td style="padding: 15px;">
                                <?php if (!empty($record->scanner_id)): ?>
                                    <span style="background: #dbeafe; color: #0c4a6e; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">
                                        User #<?php echo $record->scanner_id; ?>
                                    </span>
                                <?php else: ?>
                                    <span style="background: #f3f4f6; color: #6b7280; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">
                                        Web
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</div>
