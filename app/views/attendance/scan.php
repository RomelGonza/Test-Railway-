<?php require_once APPROOT . '/views/inc/header.php'; ?>

<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-mobile-alt"></i> Panel de Escaneo</h2>
            <p class="text-muted">
                Evento: <strong><?php echo h($event->name); ?></strong> | 
                Escaneador: <strong><?php echo h($user->name); ?></strong>
            </p>
        </div>
    </div>

    <div class="row">
        <!-- Área de escaneo -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-camera"></i> Escanear Código QR</h5>
                </div>
                <div class="card-body">
                    <!-- Aquí irá la cámara web si se implementa con JavaScript -->
                    <div id="scanner-container" style="min-height: 300px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                        <p class="text-muted text-center">
                            <i class="fas fa-camera-retro fa-3x mb-3"></i><br>
                            Requiere librería de escaneo<br>
                            (compatible con mobile_scanner, jsQR, etc.)
                        </p>
                    </div>

                    <!-- Input alternativo o para pruebas -->
                    <div class="mt-3">
                        <label for="tokenInput" class="form-label">O ingresa el token manualmente:</label>
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control" 
                                   id="tokenInput" 
                                   placeholder="Pega el token aquí"
                                   autofocus>
                            <button class="btn btn-primary" onclick="processToken()">
                                <i class="fas fa-arrow-right"></i> Procesar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resultado del escaneo -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-check-circle"></i> Resultado del Escaneo</h5>
                </div>
                <div class="card-body">
                    <div id="resultMessage" class="alert alert-secondary" style="display: none;">
                        <!-- Los resultados se mostrarán aquí -->
                    </div>

                    <!-- Historial de escaneos -->
                    <div id="scanHistory">
                        <p class="text-muted text-center">Los escaneos aparecerán aquí...</p>
                    </div>

                    <table class="table table-sm mt-3" id="scanTable" style="display: none;">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Hora</th>
                            </tr>
                        </thead>
                        <tbody id="scanTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de volver -->
    <div class="mt-4">
        <a href="<?php echo URLROOT; ?>/attendance/list" class="btn btn-outline-primary">
            <i class="fas fa-list"></i> Ver Lista Completa
        </a>
        <a href="<?php echo URLROOT; ?>/pages/index" class="btn btn-outline-secondary">
            <i class="fas fa-home"></i> Ir al Inicio
        </a>
    </div>
</div>

<script>
let scans = [];

function processToken() {
    const token = document.getElementById('tokenInput').value.trim();
    
    if (!token) {
        showResult('error', 'Por favor ingresa un token');
        return;
    }

    // Enviar token al servidor
    fetch('<?php echo URLROOT; ?>/attendance/process-scan', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ token: token })
    })
    .then(response => {
        const status = response.status;
        return response.json().then(data => ({ status, data }));
    })
    .then(({ status, data }) => {
        if (status === 200) {
            showResult('success', `✓ ${data.user.name} registrado exitosamente`, data);
            addToHistory(data.user);
        } else if (status === 409) {
            showResult('warning', '⚠ Este usuario ya fue escaneado', data);
        } else if (status === 422) {
            showResult('danger', '✗ El código QR expiró', data);
        } else if (status === 401) {
            showResult('danger', '✗ Código QR inválido', data);
        } else {
            showResult('danger', '✗ Error al procesar escaneo', data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showResult('danger', 'Error de conexión: ' + error.message);
    });

    // Limpiar input
    document.getElementById('tokenInput').value = '';
    document.getElementById('tokenInput').focus();
}

function showResult(type, message, data = null) {
    const resultDiv = document.getElementById('resultMessage');
    const bgClass = {
        success: 'alert-success',
        warning: 'alert-warning',
        danger: 'alert-danger',
        error: 'alert-danger'
    }[type] || 'alert-secondary';

    let html = `<div class="alert ${bgClass} mb-0">${message}`;
    if (data && data.user) {
        html += `<hr><strong>${data.user.name}</strong><br><small>${data.user.email}</small>`;
    }
    html += '</div>';

    resultDiv.innerHTML = html;
    resultDiv.style.display = 'block';

    // Auto-ocultar después de 5 segundos
    setTimeout(() => {
        resultDiv.style.display = 'none';
    }, 5000);
}

function addToHistory(user) {
    const now = new Date();
    const timeStr = now.toLocaleTimeString('es-ES');
    
    scans.unshift({ name: user.name, email: user.email, time: timeStr });

    const table = document.getElementById('scanTable');
    const tbody = document.getElementById('scanTableBody');
    const history = document.getElementById('scanHistory');

    if (scans.length === 1) {
        // Primera entrada, mostrar tabla y ocultar mensaje
        history.style.display = 'none';
        table.style.display = 'table';
    }

    // Agregar fila
    const row = tbody.insertRow(0);
    row.innerHTML = `
        <td><strong>${escapeHtml(user.name)}</strong></td>
        <td><small>${escapeHtml(user.email)}</small></td>
        <td><small>${timeStr}</small></td>
    `;

    // Límite de 10 escaneos visibles
    if (tbody.rows.length > 10) {
        tbody.deleteRow(tbody.rows.length - 1);
    }
}

function escapeHtml(text) {
    const map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.replace(/[&<>"']/g, m => map[m]);
}

// Permitir presionar Enter en el input
document.getElementById('tokenInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        processToken();
    }
});
</script>

<?php require_once APPROOT . '/views/inc/footer.php'; ?>
