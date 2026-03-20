import 'package:flutter/material.dart';
import 'package:mobile_scanner/mobile_scanner.dart';

class QrPreview extends StatefulWidget {
  final MobileScannerController controller;
  final void Function(BarcodeCapture) onDetect;
  final bool isScanning;
  final VoidCallback onScanPressed;

  const QrPreview({
    super.key,
    required this.controller,
    required this.onDetect,
    required this.isScanning,
    required this.onScanPressed,
  });

  @override
  State<QrPreview> createState() => _QrPreviewState();
}

class _QrPreviewState extends State<QrPreview> with SingleTickerProviderStateMixin {
  late AnimationController _animationController;
  late Animation<double> _scanAnimation;

  @override
  void initState() {
    super.initState();
    _animationController = AnimationController(
      vsync: this,
      duration: const Duration(seconds: 2),
    )..repeat(reverse: true);
    _scanAnimation = Tween<double>(begin: 0, end: 230).animate(_animationController);
  }

  @override
  void dispose() {
    _animationController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.infinity,
      margin: const EdgeInsets.symmetric(horizontal: 24),
      decoration: BoxDecoration(
        color: const Color(0xFF333333),
        borderRadius: BorderRadius.circular(24),
        boxShadow: [
          BoxShadow(
            color: Colors.black.withAlpha(50),
            blurRadius: 15,
            spreadRadius: 2,
          ),
        ],
      ),
      child: Column(
        children: [
          const Padding(
            padding: EdgeInsets.only(top: 20, bottom: 12),
            child: Text(
              'Asistencia al Congreso',
              style: TextStyle(color: Colors.white, fontSize: 18, fontWeight: FontWeight.w500),
            ),
          ),
          Stack(
            alignment: Alignment.center,
            children: [
              // Scanner Area
              Container(
                width: 250,
                height: 250,
                decoration: BoxDecoration(
                  borderRadius: BorderRadius.circular(16),
                  color: Colors.black,
                ),
                child: ClipRRect(
                  borderRadius: BorderRadius.circular(16),
                  child: MobileScanner(
                    controller: widget.controller,
                    onDetect: widget.onDetect,
                  ),
                ),
              ),
              // Corner Masks (Custom Painter or Stack of Icons)
              SizedBox(
                width: 250,
                height: 250,
                child: CustomPaint(
                  painter: ScannerCornerPainter(),
                ),
              ),
              // Scan Line Animation
              if (widget.isScanning)
                AnimatedBuilder(
                  animation: _scanAnimation,
                  builder: (context, child) {
                    return Positioned(
                      top: 10 + _scanAnimation.value,
                      child: Container(
                        width: 230,
                        height: 2,
                        decoration: BoxDecoration(
                          boxShadow: [
                            BoxShadow(
                              color: const Color(0xFF4DB6AC).withAlpha(150),
                              blurRadius: 8,
                              spreadRadius: 1,
                            ),
                          ],
                          gradient: LinearGradient(
                            colors: [
                              const Color(0xFF4DB6AC).withAlpha(0),
                              const Color(0xFF4DB6AC),
                              const Color(0xFF4DB6AC).withAlpha(0),
                            ],
                          ),
                        ),
                      ),
                    );
                  },
                ),
            ],
          ),
          const SizedBox(height: 24),
          ElevatedButton(
            onPressed: widget.isScanning ? null : widget.onScanPressed,
            style: ElevatedButton.styleFrom(
              backgroundColor: widget.isScanning ? Colors.grey : const Color(0xFF80CBC4),
              foregroundColor: Colors.black,
              padding: const EdgeInsets.symmetric(horizontal: 24, vertical: 12),
              shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(30)),
              elevation: 0,
            ),
            child: Text(
              widget.isScanning ? 'BUSCANDO CÓDIGO...' : 'ESCANEAR QR DE ASISTENCIA', 
              style: const TextStyle(fontWeight: FontWeight.bold, letterSpacing: 0.5)
            ),
          ),
          const Padding(
            padding: EdgeInsets.symmetric(vertical: 16, horizontal: 20),
            child: Text(
              'Apunte la cámara al código QR de su gafete',
              textAlign: TextAlign.center,
              style: TextStyle(color: Colors.white70, fontSize: 13),
            ),
          ),
        ],
      ),
    );
  }
}

class ScannerCornerPainter extends CustomPainter {
  @override
  void paint(Canvas canvas, Size size) {
    final paint = Paint()
      ..color = Colors.white
      ..strokeWidth = 4
      ..style = PaintingStyle.stroke
      ..strokeCap = StrokeCap.round;

    const cornerLength = 30.0;
    const radius = 16.0;

    // Top Left
    canvas.drawArc(Rect.fromLTWH(0, 0, radius * 2, radius * 2), 3.14, 1.57, false, paint);
    canvas.drawLine(const Offset(radius, 0), const Offset(radius + cornerLength, 0), paint);
    canvas.drawLine(const Offset(0, radius), const Offset(0, radius + cornerLength), paint);

    // Top Right
    canvas.drawArc(Rect.fromLTWH(size.width - radius * 2, 0, radius * 2, radius * 2), 4.71, 1.57, false, paint);
    canvas.drawLine(Offset(size.width - radius - cornerLength, 0), Offset(size.width - radius, 0), paint);
    canvas.drawLine(Offset(size.width, radius), Offset(size.width, radius + cornerLength), paint);

    // Bottom Left
    canvas.drawArc(Rect.fromLTWH(0, size.height - radius * 2, radius * 2, radius * 2), 1.57, 1.57, false, paint);
    canvas.drawLine(Offset(radius, size.height), Offset(radius + cornerLength, size.height), paint);
    canvas.drawLine(Offset(0, size.height - radius - cornerLength), Offset(0, size.height - radius), paint);

    // Bottom Right
    canvas.drawArc(Rect.fromLTWH(size.width - radius * 2, size.height - radius * 2, radius * 2, radius * 2), 0, 1.57, false, paint);
    canvas.drawLine(Offset(size.width - radius - cornerLength, size.height), Offset(size.width - radius, size.height), paint);
    canvas.drawLine(Offset(size.width, size.height - radius - cornerLength), Offset(size.width, size.height - radius), paint);
  }

  @override
  bool shouldRepaint(CustomPainter oldDelegate) => false;
}
