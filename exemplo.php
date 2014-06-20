<?php
/**
 * HTMLClass
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmail.com>
 * @copyright 2013 Maickon José Rangel <maickonmaickonmaickon@Gmail.com>
 * @category PHP
 * @version   1.0
 * 
 * Exemplo em uso da classe tags
 * Este exemplo ilustra o uso da classe tags, os arquivos .css, .js e etc carregados sao meramentes ilustrativos.
 */

require_once 'HTMLtags.class.php';
require_once 'tagFunctions.php';
//criando um objeto tag
$tag = new tags();

$tag->open('html','lang=""');
	$tag->open('head');
		//pode-se abrir um arquivo css atraves do metodo open()
		//O primeiro parametro se refere ao nome da tag e o segundo aos seus argumentos referentes a tag
		$tag->open('link','rel="stylesheet" href="css/jquery.autocomplete.css"');
		
		//tags que necessitam ser fechadas devem ser fechadas pelo metodo close()
		$tag->open('script','src="js/jquery.js"');					
		$tag->close('script');
		
		//Ao inves de carregar cada arquivo separadamente, pode-se carrega-los todos de vez com o metodo loadCss($caminho)
		//passando o caminho como parametro
		$tag->loadCss('css/');
		
		//O mesmo pode ser feito com arquivos .js, basta informar o caminho por parametro ao metodo loadJs('caminho');
		$tag->loadJs('js/');
		
		$tag->open('title');
			$tag->inprime('HTML Tag Elements');
		$tag->close('title');
		
	$tag->close('head');

	$tag->open('body');
		$tag->open('div','class="row"');
			$tag->open('h1');
				//O metodo inprime como o proprio nome diz, imprime uma string	
				$tag->inprime('HTML Tag Elements - Exemplos');
			$tag->close('h1');
		$tag->close('div');
		
		//Declarando dois elementos HTML
		$name = array('nome','sobrenome','endereco');
		$label = array('Nome','Sobrenome','Endereço');
		$value = array('valor1','valor2','valor3');
		$option = array('opcao1','opcao2','opcao3');
		
		$tag->open('div','class="row"');
			$tag->open('div','class="container"');
				
				$tag->open('b');
					$tag->inprime('Input Text');
				$tag->close('b');
				$tag->open('hr');
			
				input($label,$name);
				
			$tag->close('div');
		$tag->close('div');
		
		$tag->open('div','class="row"');
			$tag->open('div','class="container"');
				
				$tag->open('b');
					$tag->inprime('Checkbox');
				$tag->close('b');
				$tag->open('hr');
				
				checkbox($value, $label, $name);
				
			$tag->close('div');
		$tag->close('div');
	
		$tag->open('div','class="row"');
			$tag->open('div','class="container"');
				
				$tag->open('b');
					$tag->inprime('Select');
				$tag->close('b');
				$tag->open('hr');
				
				select($label, $name, $option);
				
			$tag->close('div');
		$tag->close('div');
		
	$tag->close('body');
$tag->close('html');
?>