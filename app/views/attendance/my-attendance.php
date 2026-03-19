<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="mb-4">
                <i class="fas fa-history"></i> Mi Historial de Asistencia
            </h2>

            <?php if (empty($attendances)): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> 
                    No tienes registros de asistencia aún. 
                    <a href="<?php echo URLROOT; ?>/attendance/qr">Genera tu código QR</a> 
                    para ser escaneado.
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Evento</th>
                                <th>Fecha del Evento</th>
                                <th>Hora de Escaneo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($attendances as $record): ?>
                                <tr>
                                    <td>
                                        <strong><?php echo h($record->event_name); ?></strong>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y', strtotime($record->event_date)); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <small>
                                            <?php echo date('d/m/Y H:i:s', strtotime($record->scanned_at)); ?>
                                        </small>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">
                                            <i class="fas fa-check"></i> Asistencia Confirmada
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Estadísticas -->
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Total de Eventos Atendidos</h5>
                                <h2 class="text-primary"><?php echo count($attendances); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Primer Evento</h5>
                                <p class="card-text small">
                                    <?php 
                                        if (count($attendances) > 0) {
                                            $last = end($attendances);
                                            echo date('d/m/Y', strtotime($last->scanned_at));
                                        } else {
                                            echo 'N/A';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Último Evento</h5>
                                <p class="card-text small">
                                    <?php 
                                        if (count($attendances) > 0) {
                                            $first = $attendances[0];
                                            echo date('d/m/Y', strtotime($first->scanned_at));
                                        } else {
                                            echo 'N/A';
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Botón de volver -->
            <div class="mt-4">
                <a href="<?php echo URLROOT; ?>/attendance/qr" class="btn btn-primary">
                    <i class="fas fa-qrcode"></i> Mi Código QR
                </a>
                <a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
