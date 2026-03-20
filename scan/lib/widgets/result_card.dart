import 'package:flutter/material.dart';
import '../models/attendance_response.dart';

class ResultCard extends StatelessWidget {
  final AttendanceResponse? response;

  const ResultCard({super.key, this.response});

  @override
  Widget build(BuildContext context) {
    if (response == null) {
      return const SizedBox(height: 100);
    }

    final isSuccess = response!.success;
    final color = isSuccess ? const Color(0xFF2E7D32) : const Color(0xFFC62828);
    final icon = isSuccess ? Icons.check_circle_outline : Icons.error_outline;

    return AnimatedOpacity(
      opacity: response != null ? 1.0 : 0.0,
      duration: const Duration(milliseconds: 300),
      child: Card(
        elevation: 4,
        margin: const EdgeInsets.symmetric(horizontal: 20, vertical: 10),
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(12)),
        color: color.withAlpha(25),
        child: Padding(
          padding: const EdgeInsets.all(16.0),
          child: Row(
            children: [
              Icon(icon, color: color, size: 40),
              const SizedBox(width: 16),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Text(
                      isSuccess ? '¡Éxito!' : 'Error',
                      style: TextStyle(
                        color: color,
                        fontWeight: FontWeight.bold,
                        fontSize: 18,
                      ),
                    ),
                    const SizedBox(height: 4),
                    Text(
                      response!.message,
                      style: const TextStyle(
                        color: Color(0xFF212121),
                        fontSize: 14,
                      ),
                    ),
                    if (isSuccess && response!.data != null) ...[
                      const SizedBox(height: 4),
                      Text(
                        'Usuario: ${response!.data!.userName}',
                        style: const TextStyle(
                          fontWeight: FontWeight.w500,
                          fontSize: 14,
                        ),
                      ),
                    ],
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
