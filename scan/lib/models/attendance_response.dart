class AttendanceResponse {
  final bool success;
  final String message;
  final AttendanceData? data;
  final int? statusCode;

  AttendanceResponse({
    required this.success,
    required this.message,
    this.data,
    this.statusCode,
  });

  factory AttendanceResponse.fromJson(Map<String, dynamic> json, int statusCode) {
    bool isSuccess = json['status'] == 'ok';
    String msg = '';

    if (isSuccess) {
      msg = 'Asistencia Registrada';
    } else {
      switch (json['status']) {
        case 'unauthorized':
          msg = 'Acceso Denegado: Token de escáner no válido';
          break;
        case 'invalid_token':
          msg = 'Código QR Inválido o Falso';
          break;
        case 'expired_token':
          msg = 'Código QR Expirado';
          break;
        case 'already_registered':
          msg = 'Asistencia YA registrada previamente';
          break;
        default:
          msg = json['message'] ?? 'Error desconocido del servidor';
      }
    }

    return AttendanceResponse(
      success: isSuccess,
      message: msg,
      data: json['user'] != null ? AttendanceData.fromJson(json['user']) : null,
      statusCode: statusCode,
    );
  }

  factory AttendanceResponse.error(String message, {int? statusCode}) {
    return AttendanceResponse(
      success: false,
      message: message,
      statusCode: statusCode,
    );
  }
}

class AttendanceData {
  final String userName;
  final int userId;

  AttendanceData({
    required this.userName,
    required this.userId,
  });

  factory AttendanceData.fromJson(Map<String, dynamic> json) {
    return AttendanceData(
      userName: json['name'] ?? 'Usuario',
      userId: json['id'] ?? 0,
    );
  }
}
