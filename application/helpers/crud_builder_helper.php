<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function create_display($name, $format, $value, $optionlist, $placeholder)
{
    switch ($format):
        case 'TEXT':
            $data = form_input($name, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'TEXT_DISABLED':
            $data = form_input($name, $value, 'class="form-control" placeholder="'.$placeholder.'" disabled="disabled"');
            break;
        case 'HIDDEN':
            $data = form_hidden($name, $value, 'class="form-control"');
            break;
        case 'PASSWORD':
            $data = form_password($name, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'DATEPICKER':
            $data = form_input($name, $value, 'class="form-control date-picker" placeholder="'.$placeholder.'"');
            break;
        case 'TIMEPICKER':
            $data = form_input($name, $value, 'class="form-control time-picker" placeholder="'.$placeholder.'"');
            break;
        case 'TEXTAREA':
            $data = form_textarea($name, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'DROPDOWN':
            $data = form_dropdown($name, $optionlist, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'DROPDOWN_MDL':
            $data = form_dropdown($name, $optionlist, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'SELECT2':
            $data = form_dropdown($name, $optionlist, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'FILE':
            $data = form_file($name, $value, 'class="form-control" placeholder="'.$placeholder.'"');
            break;
        case 'RADIO':
            $data = '';
            $keys = array_keys($optionlist);
            $i = 0;
            foreach ($optionlist as $row):
                $data .= "<label>" . form_radio($name, $keys[$i], 'class="form-control" id=""'). $row. "</label>&nbsp;&nbsp;&nbsp;";
                $i++;
            endforeach;
            break;
        case 'CHECKBOX':
            $data = form_checkbox($name, $value, 'class="form-control"');
            break;
        
    endswitch;
    return $data;
}        