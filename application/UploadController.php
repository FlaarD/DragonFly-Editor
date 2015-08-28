<?php

require_once PATH.'/application/Controller.php';

class UploadController extends Controller {
    
    public function indexAction() {
        $this->_view->assign('target',BASE_URL.'upload/verify');
        $this->_view->setTitle('DragonFly Editor - Upload');
        $this->_view->setDescription('Upload system for the DragonFly Editor');
        $this->_view->addCss('/css/upload.css');
        $this->_view->addJs('/js/upload.js');
    }
    
    public function verifyAction() {
        if (isset($_FILES['uploaded1']['tmp_name'])) {
            session_start();
            $values = array('itemSets' => array());
            foreach ($_FILES as $file) {
                if ($file['tmp_name'] !== '') {
                    $json = file_get_contents($file['tmp_name']);
                    $properties = strpos($json, '"itemSets":');
                    if ($properties !== false) {
                        $json = '{'.substr($json, $properties);
                    }
                    $val = $this->_jsonReader($json);
                    if (isset($val['itemSets'])) {
                        foreach ($val as $set) {
                            $values['itemSets'][] = $set;
                        }
                    } else {
                        $values['itemSets'][] = $val;
                    }
                }
            }
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