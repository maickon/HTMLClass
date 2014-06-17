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

require_once 'tags.class.php';
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
		$tag->loadCss('caminho/');
		
		//O mesmo pode ser feito com arquivos .js, basta informar o caminho por parametro ao metodo loadJs('caminho');
		$tag->loadJs('caminho/');
		
		$tag->open('title');
			$tag->inprime('SITENAME');
		$tag->close('title');
		
	$tag->close('head');

	$tag->open('body');
		//O metodo inprime como o proprio nome diz, imprime uma string
		$tag->inprime('Barra de menus');	
		
		$tag->open('div','class="row"');
			$tag->inprime('Logo');
		$tag->close('div');
			
		$tag->open('div','class="row"');
			$tag->open('div','class="container"');
				$tag->inprime('Conteudo');	
			$tag->close('div');
		$tag->close('div');
		
		$tag->open('div','class="row"');
			$tag->open('div');
				$tag->inprime('Rodape');
			$tag->close('div');
		$tag->close('div');
		
	$tag->close('body');
$tag->close('html');
?>