<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * NitroCart Boolean Field Type
 * The choice just want good enought. It stores data as a VARCHAR, we need INT 1
 *
 * @package		NitroCart
 * @author		NitroCart Dev Team
 * @copyright	Copyright (c) 2012 - 2014, NitroCart
 */
class Field_boolean
{
	public $field_type_slug			= 'boolean';
	
	public $db_col_type				= 'int';

	public $col_constraint			= 1;

	public $custom_parameters		= array('default_value','false_text','true_text');
	
	public $extra_validation		= 'integer';

	public $version					= '1.0.0';

	public $author					= array('name'=>'NitroCart Development Team', 'url'=>'http://nitrocart.net');


		
	// --------------------------------------------------------------------------



	public function param_default_value($value)
	{
		return array(
		      'input'     => form_dropdown('default_value', array(0=> 'FALSE', 1=>'TRUE'), $value ),
		      'instructions'  => 'Default Value ? '
		    );
	}


	public function param_false_text($value)
	{
		return array(
		      'input'     => form_input('false_text', $value),
		      'instructions'  => 'Enter the text for the FALSE option'
		    );
	}
	public function param_true_text($value)
	{
		return array(
		      'input'     => form_input('true_text', $value),
		      'instructions'  => 'Enter the text for the TRUE option'
		    );
	}	

	/**
	 * Output form input
	 *
	 * @param	array
	 * @param	array
	 * @return	string
	 */
	public function form_output($data)
	{
		return $this->_display_as_dropdown($data);
	}


	private function _display_as_dropdown($data)
	{

		$myoptions = $data['custom'];

		if( ! is_array($myoptions))
		{
			$myoptions=unserialize($myoptions);
		}
		

		$no = $myoptions['false_text'];
		$yes = $myoptions['true_text'];

		$form_name = $data['form_slug'];

		$options = array( 0=>$no, 1 => $yes );

		$extra = "id='".$data['form_slug']."'";

		$data['value'] = ( ((int)$data['value']) >= 1)?1:0;


		return form_dropdown($data['form_slug'] , $options, $data['value'],$extra);
	}

	public function validate($value, $mode, $field)
	{
		if($mode =='edit'){}
	    if($value != 1) {}
	    return TRUE;
	}

	
	public function pre_output($input)
	{
	    return $input;
	}
	public function pre_save($input)
	{
	    return $input;
	}
	public function event($field)
	{
	    //$this->CI->type->add_css('datetime', 'datepicker.css');
	}	

}