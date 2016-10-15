<?php
class Form {

    private $datas = [];

    public function __construct($datas = []){
        $this->datas = $datas;
    }

    private function input($type, $name, $placeholder, $img){
        $value = "";
        if(isset($this->datas[$name])){
            $value = $this->datas[$name];
        }
        if($type == 'textarea'){
            $input = "<div class=\"flexRow fc_message\">
						<label class=\"fc_label\" for=\"$name\">
                     <div class=\"icon\"><img src=\"img/css/$img.png\" alt=\"\"></div>
						</label>
                    <textarea name=\"message\" id=\"message\" rows=\"7\" placeholder=$placeholder required>$value</textarea>
					</div>";
        }else{
            $input = "<div class=\"flexRow\">
						<label class=\"fc_label\" for=\"$name\">
                     <div class=\"icon\"><img src=\"img/css/$img.png\" alt=\"\"></div>
						</label>
                    <input type=\"$type\" id=\"$name\" class=\"fc_input\" placeholder=$placeholder name=$name value=\"$value\" required>
					</div>";
        }
        return $input;
    }
    public function text($name, $placeholder){
        return $this->input('text', $name, $placeholder, 'user');
    }
    public function email($name, $placeholder){
        return $this->input('email', $name, $placeholder,'mail');
    }
    public function textarea($name, $placeholder){
        return $this->input('textarea', $name, $placeholder, 'message');

    }
}