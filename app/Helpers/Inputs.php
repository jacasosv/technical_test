<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

Class Inputs{

    public static function text(string $label = "", string $id = "",  $name_input ="" , string $class="", array $attributes=[], $item=null, object $errors=null, string $default='', $readonly=false, string $help_block='', $disabled=false, $password=false, $is_horizontal=false, $col_input='', $addon='', $name_real_input = ''){

        $brackets = '';

        if(is_object($item)){

            if (strpos($name_input, '[') !== false  || strpos($name_input, '][') !== false ) {

                $bk = explode('[',$name_input);

                $name_input = $bk[0];

                $real_value =  $item->{$name_real_input};

                for($i = 1; $i < count($bk); $i++){

                    $brackets .= '['.$bk[$i];
                }

            } else {

                if($password){

                    $real_value = '';

                }else{

                    $real_value =  $item->{$name_input};
                }
            }
        }else{

            $real_value = '';
        }

        if(empty($real_value)){
            $real_value = $default;
        }

        $options = '';
        if( count($attributes) >0 ){

            foreach($attributes as $key => $value){

                $options .= $key.' = "'.$value.'" ';
            }
        }

        $class = empty($class) ? '' : ' '.$class;
        $class_error = '';
        $div_class_error_message = '';

        if (!empty($errors)){

            if ($errors->has($name_input)){

                $class_error = ' is-invalid';

                $div_class_error_message = '<div class="text-danger">';
                $div_class_error_message .=  $errors->first($name_input);
                $div_class_error_message .= '</div>';
            }
        }

        if($password){
            $type_input = 'password';
        }else{
            $type_input = 'text';
        }

        $text_help_block = '';
        if(!empty($help_block)){
            $text_help_block  .=  '   <small id="help-block-'.$id.'" class="form-text text-muted"> <i class="fas fa-fw fa-map-marker-alt "></i>'.$help_block.'</small>';
        }

        $readonly = $readonly ? 'readonly':'';
        $disabled = $disabled ? 'disabled':'';

        if ($is_horizontal) {

            $col_input = empty($col_input) ? 9 :  $col_input;
            $input = '<div class="form-group row">
                        <label for="' . $id . '" class="col-sm-3 col-form-label">' . $label . '</label>
                        <div class="col-sm-'.$col_input.'">
                            <input type="' . $type_input . '" class="form-control' . $class . $class_error . '" name="' . $name_input . $brackets . '" id="' . $id . '" value="' . old($name_input . $brackets, $real_value) . '" ' . $options . ' ' . $readonly . ' ' . $disabled . ' />';
            $input .= $text_help_block;
            $input .= '</div>';

            $input .= $div_class_error_message;
            $input .= '</div>';

        } else {

            if($addon == '') {
                $input = '<div class="form-group">
                        <label class="mb-2" for="' . $id . '">' . $label . '</label>
                        <input type="' . $type_input . '" class="form-control' . $class . $class_error . '" name="' . $name_input . $brackets . '" id="' . $id . '" value="' . old($name_input . $brackets, $real_value) . '" ' . $options . ' ' . $readonly . ' ' . $disabled . ' />';

                $input .= $text_help_block;
                $input .= $div_class_error_message;
                $input .= '</div>';
            } else {

                $input = '  <label for="' . $name_input . '">' . $label . '</label>
                            <div class="input-group mb-3">
                                <input type="' . $type_input . '" aria-describedby="addon-'.$id.'" class="form-control' . $class . $class_error . '" name="' . $name_input . $brackets . '" id="' . $id . '" value="' . old($name_input . $brackets, $real_value) . '" ' . $options . ' ' . $readonly . ' ' . $disabled . ' />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="addon-'.$id.'">'.$addon.'</span>
                                </div>';
                $input .= $text_help_block;
                $input .= $div_class_error_message;
                $input .= '  </div>';
            }
        }

        return $input;
    }


    public static function textarea(string $label = "", string $id = "", string $name ="" , string $class="", array $attributes=[], $item=null, object $errors=null, int $rows=4, $show_translations = false , $table=null){

        $real_value = is_object($item) ?  $item->{$name} : '';

        $options = '';

        if( count($attributes) >0 ){

            foreach($attributes as $key => $value){

                $options .= $key.' = "'.$value.'" ';
            }
        }

        $class_error = '';
        $div_class_error_message = '';

        if (!empty($errors)){

            if ($errors->has($name)){

                $class_error = ' is-invalid';

                $div_class_error_message = '<div class="text-danger">';
                $div_class_error_message .=  $errors->first($name);
                $div_class_error_message .= '</div>';
            }
        }

        $input = '  <div class="form-group mt-3">
                        <label class="mb-2" for="'.$name.'">'.$label.'</label>
                        <textarea class="form-control '.$class.' '.$class_error.'" name="'.$name.'" id="'.$id.'" rows="'.$rows.'" '.$options.'>'.old($name, $real_value).'</textarea>';
        $input .= $div_class_error_message;
        $input .= '</div>';

        return $input;

    }


}

?>




