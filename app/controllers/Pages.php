<?php
class Pages extends Controller {
    public function __construct() {
        // Models will be loaded as needed
    }

    public function index() {
        $data = [
            'title' => 'ONTA PERU 2026 | 56ª Reunión Anual de Nematología',
            'description' => 'Bienvenidos a la 56ª Reunión Anual ONTA en Puno, Perú. El encuentro científico sobre nematología más relevante de América Latina y el mundo.'
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'Sobre el Congreso | ONTA PERU 2026',
            'description' => 'Conoce más sobre la historia y los objetivos de la 56ª Reunión Anual de la Organization of Nematologists of Tropical America.'
        ];

        $this->view('pages/about', $data);
    }

    public function comite() {
        $data = [
            'title' => 'Comité Científico y Organizador | ONTA PERU 2026',
            'description' => 'Conoce a los expertos y líderes académicos que conforman el comité científico y organizador del evento ONTA 2026.'
        ];

        $this->view('pages/comite', $data);
    }

    public function areas() {
        $data = [
            'title' => 'Áreas Temáticas y Especialidades | ONTA PERU 2026',
            'description' => 'Explora los campos de investigación: Taxonomía, Control Biológico, Interacción Nematodo-Planta y más en ONTA 2026.'
        ];

        $this->view('pages/areas', $data);
    }

    public function programacion() {
        $data = [
            'title' => 'Cronograma y Programación Científica | ONTA PERU 2026',
            'description' => 'Consulta el calendario detallado de ponencias, mesas redondas y talleres prácticos de la reunión anual.'
        ];

        $this->view('pages/programacion', $data);
    }

    public function inscriptions() {
        $data = [
            'title' => 'Inscripciones y Tarifas | ONTA PERU 2026',
            'description' => 'Asegura tu participación en el congreso. Consulta las tarifas para miembros, estudiantes y profesionales nacionales e internacionales.'
        ];

        $this->view('pages/inscriptions', $data);
    }

    public function abstracts() {
        $data = [
            'title' => 'Envío de Resúmenes Científicos | ONTA PERU 2026',
            'description' => 'Instrucciones y plataforma para el envío de trabajos científicos y pósteres. Comparte tu investigación con la comunidad global.'
        ];

        $this->view('pages/abstracts', $data);
    }

    public function puno() {
        $data = [
            'title' => 'Turismo en Puno y Lago Titicaca | ONTA PERU 2026',
            'description' => 'Guía del visitante para Puno, la Capital Folklórica del Perú. Descubre el Lago Titicaca, las Islas de los Uros y Sillustani.'
        ];

        $this->view('pages/puno', $data);
    }
}
