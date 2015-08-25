<?php

require_once PATH.'/application/Controller.php';

class UploadController extends Controller {
    
    public function indexAction() {
        $this->_view = new View('upload');
        $this->_view->assign('target',BASE_URL.'upload/verify');
    }
    
    public function verifyAction() {
        if (isset($_FILES['uploaded']['tmp_name'])) {
            session_start();
            $json = file_get_contents($_FILES['uploaded']['tmp_name']);
            $properties = strpos($json, '"itemSets":');
            if ($properties !== false) {
                $json = '{'.substr($json, $properties);
            }
            $values = $this->_jsonReader($json);
            $values = (isset($values['itemSets']) ? $values : array('itemSets' => array($values)));
            $_SESSION['set'] = $values;
            header('Location: '.BASE_URL.'index');
            exit();
        }
        header('Location: '.BASE_URL.'index');
        exit();
    }
    
    private function _jsonReader($json) {
        if ($json[0] !== '{') {
            return null;
        }
        $res = array();
        $open = 0;
        $close = 0;
        $i = 0;
        $l = strlen($json);
        do{
            $c = $json[$i];
            switch ($c) {
                case '{' :
                    $open++;
                    break;
                case '}' :
                    $close++;
                    break;
            }
            $i++;
        } while ($i<$l && $open !== $close);
        return json_decode(substr($json,0,$i), true);
    }
}