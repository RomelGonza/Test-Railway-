import 'dart:convert';
import 'package:http/http.dart' as http;
import '../models/attendance_response.dart';

class ApiService {
  // Base URL: Use 10.0.2.2 for Android Emulator, localhost for others
  // In a real scenario, this would be a configurable environment variable.
  // Base URL para dispositivo físico conectado a la misma red Wi-Fi
  // Importante: El celular y tu PC deben estar en la misma red Wi-Fi
  static const String _baseUrl = 'https://test-railway-production-efe3.up.railway.app/'; // Ip de tu Wi-Fi conectada al Docker

  // Reemplaza esto con el token generado para la cuenta de Scanner (organizador_hash_token)
  // Puedes obtener/crear uno temporalmente con una petición POST a /api/token
  static const String _apiToken = 'organizador_onta_2026_super_secret_key'; 

  Future<AttendanceResponse> scanAttendance(String token) async {
    try {
      final response = await http.post(
        Uri.parse('$_baseUrl/api/scan'),
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer $_apiToken',
        },
        body: jsonEncode({
          'token': token,
        }),
      ).timeout(const Duration(seconds: 5));

      final Map<String, dynamic> responseData = jsonDecode(response.body);
      return AttendanceResponse.fromJson(responseData, response.statusCode);
    } catch (e) {
      if (e.toString().contains('TimeoutException')) {
        return AttendanceResponse.error('Error: Tiempo de espera agotado', statusCode: 408);
      }
      return AttendanceResponse.error('Error: Sin conexión al servidor');
    }
  }
}
