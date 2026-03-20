import 'package:flutter/material.dart';
import 'screens/scanner_screen.dart';

void main() {
  runApp(const AttendanceApp());
}

class AttendanceApp extends StatelessWidget {
  const AttendanceApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'ONTA PERU - Asistencia',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        useMaterial3: true,
        primaryColor: const Color(0xFF1F3A93),
        colorScheme: ColorScheme.fromSeed(
          seedColor: const Color(0xFF1F3A93),
          primary: const Color(0xFF1F3A93),
          secondary: const Color(0xFF4DB6AC), // Turquoise/Teal from image
          surface: Colors.white,
        ),
        scaffoldBackgroundColor: Colors.white,
        textTheme: const TextTheme(
          displayMedium: TextStyle(
            color: Color(0xFF1F3A93),
            fontWeight: FontWeight.bold,
            fontSize: 22,
          ),
          bodyLarge: TextStyle(color: Color(0xFF212121), fontSize: 16),
          bodyMedium: TextStyle(color: Color(0xFF757575), fontSize: 14),
        ),
        appBarTheme: const AppBarTheme(
          backgroundColor: Colors.white,
          foregroundColor: Color(0xFF1F3A93),
          elevation: 0,
          centerTitle: true,
        ),
      ),
      home: const ScannerScreen(),
    );
  }
}
