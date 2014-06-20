<?php
/**
 * HTMLClass
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmail.com>
 * @copyright 2013 Maickon José Rangel <maickonmaickonmaickon@Gmail.com>
 * @category PHP
 * @version   1.0
 * 
 */

require_once 'HTMLtags.class.php';

function input(array $labels, array $names, $value='', $disabled='',$type='text',array $id=null,array $class=null, $size=20){
	$tag=new tags();
	for($i=0; $i<count($names); $i++):
		$tag->open('label');
			$tag->inprime($labels[$i]);
		$tag->close('label');
		if($disabled != ''):
			$disabled = 'disabled="disabled"';
		endif;

		isset($id[$i])?$_id = 'id="'.$id[$i].'"':$_id=' ';
		isset($class[$i])?$_class = 'class="'.$class[$i].'"':$_class=' ';
		
		if($value == ''):
			$tag->open('input',''.$_id.''.$_class.' type="'.$type.'" '.$disabled.' size="'.$size.'" name="'.$names[$i].'"');
		else:
			$tag->open('input',''.$_id.''.$_class.' type="'.$type.'" '.$disabled.' size="'.$size.'" name="'.$names[$i].'" value="'.$value[$i].'"');
		endif;
	endfor;
}

function checkbox($value,$label,$name,$edit=null,$objeto=null,$disabled=''){
	$tag = new tags();
	if($disabled != ''):
		$disabled = 'disabled="disabled"';
	endif;
	if($edit == null && $objeto == null):
		for($i=0; $i<count($value); $i++):
			$tag->open('label','class="checkbox"');
				$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
					$tag->inprime($label[$i]);
			$tag->close('label');
		endfor;
	else:
		for($i=0; $i<count($value); $i++):
			if(isset($objeto->$name[$i])):
				if($objeto->$name[$i] == $name[$i]):
					$tag->open('label','class="checkbox"');
						$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.' checked');
						$tag->inprime($label[$i]);
					$tag->close('label');
				else:
					$tag->open('label','class="checkbox"');
						$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
						$tag->inprime($label[$i]);
					$tag->close('label');
				endif;
			else:
				$tag->open('label','class="checkbox"');
					$tag->open('input','type="checkbox" name="'.$name[$i].'" value="'.$value[$i].'" '.$disabled.'');
					$tag->inprime($label[$i]);
				$tag->close('label');
			endif;
		endfor;
	endif;	

function select($labels,$names,$options,$edit=null,$objeto=null,$disabled=''){
	$tag = new tags();
	if($disabled != ''):
		$disabled = 'disabled="disabled"';
	endif;
	if($edit == null && $objeto == null):
		for($i=0; $i<count($labels); $i++):
			$tag->open('label');
				$tag->inprime($labels[$i]);
			$tag->close('label');
			
			$tag->open('select','name="'.$names[$i].'" '.$disabled.'');
			for($j=0; $j<count($options); $j++):
				$tag->open('option');
					$tag->inprime($options[$j]);
				$tag->close('option');
			endfor;
			$tag->close('select');
		endfor;
	else:
		for($i=0; $i<count($labels); $i++):
			$tag->open('label','for="tipo"');
				$tag->inprime($labels[$i]);
			$tag->close('label');
					
			$tag->open('select','id="customDropdown" name="'.$names[$i].'" '.$disabled.'');
					
				$tag->open('option','slected="SELECTED"');
					$tag->inprime(''.limpar_campo_excluir($names[$i], $objeto).'');
				$tag->close('option');
	
				for($i=0; $i<count($options); $i++):
					$tag->open('option');
						$tag->inprime($options[$i]);
					$tag->close('option');
				endfor;
				
			$tag->close('select');
		endfor;
	endif;
}
}


?>