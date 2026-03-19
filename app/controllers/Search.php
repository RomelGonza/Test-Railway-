<?php
class Search extends Controller {
    private $searchModel;

    public function __construct() {
        $this->searchModel = $this->model('SearchModel');
    }

    public function index() {
        $query = isset($_GET['q']) ? filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING) : '';
        
        $dbResults = [];
        $staticResults = [];

        if (!empty($query) && strlen($query) >= 3) {
            $dbResults = $this->searchModel->searchDatabase($query);
            $staticResults = $this->searchModel->searchStatic($query, $GLOBALS['translations']);
        }

        $data = [
            'query' => $query,
            'db_results' => $dbResults,
            'static_results' => $staticResults,
            'total_count' => count($dbResults) + count($staticResults)
        ];

        $this->view('search/index', $data);
    }

    /**
     * AJAX search for live suggestions
     */
    public function suggestions() {
        $query = isset($_GET['q']) ? filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING) : '';
        
        if (empty($query) || strlen($query) < 2) {
            echo json_encode([]);
            return;
        }

        $results = $this->searchModel->searchDatabase($query);
        // Only return titles for suggestions
        echo json_encode($results);
    }

    /**
     * Helper to map static result keys to URLs
     */
    public function mapResultToLink($key) {
        $parts = explode('.', $key);
        $page = $parts[0];
        switch($page) {
            case 'nav': return URLROOT;
            case 'home': return URLROOT;
            case 'inscriptions': return URLROOT . '/pages/inscriptions';
            case 'abstracts': return URLROOT . '/pages/abstracts';
            case 'programacion': return URLROOT . '/pages/programacion';
            case 'areas': return URLROOT . '/pages/areas';
            case 'puno': return URLROOT . '/pages/puno';
            case 'comite': return URLROOT . '/pages/comite';
            default: return URLROOT;
        }
    }
}
