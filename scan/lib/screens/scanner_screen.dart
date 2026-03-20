import 'package:flutter/material.dart';
import 'package:mobile_scanner/mobile_scanner.dart';
import 'package:intl/intl.dart';
import '../services/api_service.dart';
import '../models/attendance_response.dart';
import '../widgets/qr_preview.dart';
import '../widgets/result_card.dart';
import '../widgets/status_counter.dart';

class ScannerScreen extends StatefulWidget {
  const ScannerScreen({super.key});

  @override
  State<ScannerScreen> createState() => _ScannerScreenState();
}

class _ScannerScreenState extends State<ScannerScreen> {
  final ApiService _apiService = ApiService();
  final TextEditingController _eventIdController = TextEditingController(text: '100');
  late final MobileScannerController _scannerController;

  AttendanceResponse? _lastResponse;
  int _scanCount = 0;
  String? _lastUser;
  String? _lastTime;
  bool _isProcessing = false;
  bool _isScanningEnabled = false; // Solo escanea si el usuario apretó el botón

  @override
  void initState() {
    super.initState();
    _scannerController = MobileScannerController(
      detectionSpeed: DetectionSpeed.normal,
      facing: CameraFacing.back,
    );
  }

  @override
  void dispose() {
    _scannerController.dispose();
    _eventIdController.dispose();
    super.dispose();
  }

  void _onDetect(BarcodeCapture capture) {
    if (_isProcessing || !_isScanningEnabled) return;

    final List<Barcode> barcodes = capture.barcodes;
    for (final barcode in barcodes) {
      if (barcode.rawValue != null) {
        // Bloquear cámara inmediatamente tras leer un código
        setState(() {
          _isScanningEnabled = false;
        });
        
        _handleScan(barcode.rawValue!);
        break; // Process only the first detected code
      }
    }
  }

  Future<void> _handleScan(String token) async {
    setState(() {
      _isProcessing = true;
    });

    final response = await _apiService.scanAttendance(token);

    if (mounted) {
      setState(() {
        _lastResponse = response;
        if (response.success) {
          _scanCount++;
          _lastUser = response.data?.userName ?? 'Usuario';
          _lastTime = DateFormat('HH:mm:ss').format(DateTime.now());
          
          // Auto-clear success message after 2 seconds
          Future.delayed(const Duration(seconds: 2), () {
            if (mounted && _lastResponse == response) {
              setState(() {
                _lastResponse = null;
              });
            }
          });
        }
        _isProcessing = false;
      });
    }
  }

  void _resetSession() {
    setState(() {
      _scanCount = 0;
      _lastUser = null;
      _lastTime = null;
      _lastResponse = null;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body: Stack(
        children: [
          SafeArea(
            child: Column(
              children: [
                const SizedBox(height: 20),
                // Header Section (Logo + Text)
                _buildHeader(),
                const SizedBox(height: 30),
                // Scanner Section (Dark Card)
                Expanded(
                  child: SingleChildScrollView(
                    physics: const BouncingScrollPhysics(),
                    child: Column(
                      children: [
                        QrPreview(
                          controller: _scannerController,
                          onDetect: _onDetect,
                          isScanning: _isScanningEnabled,
                          onScanPressed: () {
                            setState(() {
                              _isScanningEnabled = true;
                              _lastResponse = null; // Limpiar mensaje anterior
                            });
                          },
                        ),
                        const SizedBox(height: 20),
                        // Optional: Status overlay if scanning is successful
                        if (_lastResponse != null) 
                          ResultCard(response: _lastResponse),
                        
                        if (_isProcessing)
                          const Padding(
                            padding: EdgeInsets.all(8.0),
                            child: CircularProgressIndicator(
                              valueColor: AlwaysStoppedAnimation<Color>(Color(0xFF4DB6AC)),
                            ),
                          ),
                        
                        // Session Counter overlay (minimalist)
                        if (_scanCount > 0)
                          Padding(
                            padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 10),
                            child: Text(
                              'Total escaneados hoy: $_scanCount',
                              style: const TextStyle(color: Colors.grey, fontWeight: FontWeight.bold),
                            ),
                          ),
                        const SizedBox(height: 100), // Space for bottom buttons
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
          // Bottom Corner Buttons (outside normal flow)
          Positioned(
            left: 20,
            bottom: 20,
            child: _buildCornerButton(Icons.settings_outlined, 'Configuración'),
          ),
          Positioned(
            right: 20,
            bottom: 20,
            child: _buildCornerButton(Icons.help_outline, 'Ayuda'),
          ),
        ],
      ),
      bottomNavigationBar: _buildBottomNav(),
    );
  }

  Widget _buildCornerButton(IconData icon, String label) {
    return Column(
      mainAxisSize: MainAxisSize.min,
      children: [
        Icon(icon, color: Colors.grey, size: 24),
        const SizedBox(height: 4),
        Text(
          label,
          style: const TextStyle(color: Colors.grey, fontSize: 10),
        ),
      ],
    );
  }

  Widget _buildHeader() {
    return Column(
      children: [
        // Simulated Logo with Better Accuracy
        Container(
          width: 100,
          height: 100,
          decoration: BoxDecoration(
            color: Colors.white,
            borderRadius: BorderRadius.circular(10),
            border: Border.all(color: const Color(0xFF1F3A93), width: 1),
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              const Icon(Icons.terrain, size: 30, color: Color(0xFF1F3A93)),
              const Text(
                'ONTA PERU',
                style: TextStyle(
                  color: Color(0xFF1F3A93),
                  fontWeight: FontWeight.bold,
                  fontSize: 14,
                ),
              ),
              const Divider(color: Color(0xFF1F3A93), thickness: 1, indent: 20, endIndent: 20),
              const Icon(Icons.rowing, size: 15, color: Color(0xFF1F3A93)),
            ],
          ),
        ),
        const SizedBox(height: 20),
        const Text(
          'Nematología para un\nmundo sostenible:',
          textAlign: TextAlign.center,
          style: TextStyle(
            fontSize: 22,
            fontWeight: FontWeight.bold,
            color: Color(0xFF212121),
            height: 1.2,
          ),
        ),
        const SizedBox(height: 8),
        const Padding(
          padding: EdgeInsets.symmetric(horizontal: 40),
          child: Text(
            'Ciencia, Investigación, Aprendizaje e Innovación para la Agricultura del Mundo.',
            textAlign: TextAlign.center,
            style: TextStyle(
              fontSize: 14,
              color: Colors.grey,
            ),
          ),
        ),
      ],
    );
  }

  Widget _buildBottomNav() {
    return BottomNavigationBar(
      type: BottomNavigationBarType.fixed,
      backgroundColor: Colors.white,
      selectedItemColor: const Color(0xFF4DB6AC),
      unselectedItemColor: Colors.grey,
      currentIndex: 2, // QR Scan is active
      items: const [
        BottomNavigationBarItem(icon: Icon(Icons.home_outlined), label: 'Home'),
        BottomNavigationBarItem(icon: Icon(Icons.calendar_month_outlined), label: 'Programa'),
        BottomNavigationBarItem(icon: Icon(Icons.qr_code_scanner), label: 'QR Scan'),
        BottomNavigationBarItem(icon: Icon(Icons.person_outline), label: 'Mi Perfil'),
      ],
    );
  }
}
