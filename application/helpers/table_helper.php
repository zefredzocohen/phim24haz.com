<?php
/*
Gets the html data rows for the people.
*/
function get_checkbox_manage_table($id_first, $title,$controller,$sum,$data_elements = array())
{
    $div = '';
	$CI =& get_instance();
        $div .='<div id="'.$id_first.'" name="'.$id_first.'" class="panel panel-default panel-accordion panel-checkbox panel-more">';
        $div .='<div class="panel-heading">';
        $div.='<h3 class="panel-title">'.$title.'</h3>';
        $div.='<span class="toggle chevron"></span>';
        $div.='</div>';
        $div .='<div class="panel-body">';
        $div.='<div class="row">';
        $div.=get_checkbox_manage_table_data_rows($id_first, $data_elements, $sum, $controller);

        $div.=' </div>';
        $div.='</div>';
        $div.='</div>';
	return $div;
}

function get_checkbox_manage_table_data_rows($id_first, $data_elements, $sum,$controller)
{
	$CI =& get_instance();
        $div_data_rows = '';
	$table_data_rows='';
	$i=0;
        $div_data_row_left='<div class="col-xs-6">';
        $div_data_rows_right='<div class="col-xs-6">';
	foreach($data_elements->result() as $data_element)
	{
            if($i%2==0){
                $div_data_row_left .=get_checkbox_data_row($id_first, $data_element, $sum, $controller);
            }else{
                $div_data_rows_right.=get_checkbox_data_row($id_first, $data_element, $sum, $controller);
            }
            $i++;
	}
        $div_data_rows = $div_data_row_left.'</div>';
        $div_data_rows.=$div_data_rows_right.'</div>';
	if($data_elements->num_rows()==0)
	{
		$div_data_rows.="<tr><td colspan='10'><span class='col-md-12 text-center text-warning' >".lang('common_no_persons_to_display')."</span></tr>";
	}

	return $div_data_rows;
}

function get_checkbox_data_row($id_first, $data_element,$sum, $controller)
{
    $name_element = trim(strtolower($data_element->name_en));
    $name_element = str_replace(' ', '_', $name_element);
	$CI =& get_instance();
        $div_data_row ='';
	$div_data_row       .='<div class="checkbox">';
        $div_data_row       .= '<label><span class="check"></span>';
        $div_data_row       .='<input name="'.$id_first.'" value="tv" class="tclick" data-tkey="'.$id_first.'" data-tloc="'.$name_element.'" id="'.$id_first.'_'.$name_element.'" type="checkbox">'.$data_element->name.'&nbsp;';
        $div_data_row       .='<small>'.$sum.'</small>';
        $div_data_row       .='</label>';
        $div_data_row       .='</div>';
	return $div_data_row;
}


function get_result_search_manage_table($id_first,$data_elements, $controller){
        $div = '';
	$CI =& get_instance();
        $div .='<div id="'.$id_first.'>';
        $div.=get_result_search_manage_table_data_rows($id_first, $data_elements, $controller);
        $div.=' </div>';
	return $div;
}

function get_result_search_manage_table_data_rows($id, $data, $controller){
    $CI =& get_instance();
    $div_data_rows = '';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';
    $div_data_rows .=$id.'-item clearfix';


}
function get_result_search_data_row(){

}
