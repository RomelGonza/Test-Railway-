<?php
class SearchModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    /**
     * Search in database tables
     */
    public function searchDatabase($query) {
        $results = [];
        $queryParam = '%' . $query . '%';

        // 1. Search in Abstracts
        $this->db->query("SELECT id, titulo as result_title, autores as result_subtitle, 'abstracts' as category 
                         FROM abstracts 
                         WHERE (titulo LIKE :query OR autores LIKE :query OR keywords LIKE :query) 
                         AND estado = 'aprobado'
                         LIMIT 10");
        $this->db->bind(':query', $queryParam);
        $abstracts = $this->db->resultSet();
        $results = array_merge($results, $abstracts);

        // 2. Search in Agenda (Programación)
        $this->db->query("SELECT id, activity_title as result_title, speaker as result_subtitle, 'agenda' as category 
                         FROM agenda 
                         WHERE activity_title LIKE :query OR speaker LIKE :query
                         LIMIT 10");
        $this->db->bind(':query', $queryParam);
        $agenda = $this->db->resultSet();
        $results = array_merge($results, $agenda);

        // 3. Search in Gallery
        $this->db->query("SELECT id, title as result_title, category as result_subtitle, 'gallery' as category 
                         FROM gallery 
                         WHERE title LIKE :query OR description LIKE :query
                         LIMIT 10");
        $this->db->bind(':query', $queryParam);
        $gallery = $this->db->resultSet();
        $results = array_merge($results, $gallery);

        return $results;
    }

    /**
     * Search in static translations
     */
    public function searchStatic($query, $translations) {
        $results = [];
        $query = strtolower($query);

        // Recursive search in the nested translation array
        $this->recursiveSearch($translations, '', $query, $results);

        return array_slice($results, 0, 15); // Limit result search
    }

    private function recursiveSearch($array, $baseKey, $query, &$results) {
        foreach ($array as $key => $value) {
            $currentKey = $baseKey ? $baseKey . '.' . $key : $key;
            if (is_array($value)) {
                $this->recursiveSearch($value, $currentKey, $query, $results);
            } else {
                if (strpos(strtolower($value), $query) !== false) {
                    $results[] = [
                        'id' => $currentKey,
                        'result_title' => $value,
                        'result_subtitle' => $this->getHumanFriendlyPage($currentKey),
                        'category' => 'page'
                    ];
                }
            }
        }
    }

    private function getHumanFriendlyPage($key) {
        $parts = explode('.', $key);
        $page = $parts[0];
        // Map keys to human friendly page names
        $map = [
            'nav' => 'Navegación',
            'hero' => 'Inicio',
            'home' => 'Página Principal',
            'inscriptions' => 'Inscripciones',
            'abstracts' => 'Resúmenes',
            'footer' => 'Pies de página',
            'common' => 'General'
        ];
        return isset($map[$page]) ? $map[$page] : 'Información';
    }
}
