<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

@include_once 'autoload.php';

header("content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if (isset($_GET['livros'])){
	$livros = Livro::getAll();	
	if ($livros){
		foreach ($livros as $livro)
		{	
			$arr[$livro->Codigo]['Codigo']     = $livro->Codigo;
			$arr[$livro->Codigo]['Livro']      = utf8_encode($livro->Livro);
			$arr[$livro->Codigo]['Nome']       = utf8_encode($livro->Nome);
			$arr[$livro->Codigo]['Capitulos']  = $livro->Capitulos;
			$arr[$livro->Codigo]['Versiculos'] = $livro->Versiculos;			
			$arr[$livro->Codigo]['Testamento'] = $livro->Testamento;
		}		
		echo json_encode($arr);
	}
}

if (isset($_GET['biblia'])){
	$versiculos = Biblia::getLivros($_GET['biblia']);	
	
	if ($versiculos){
		foreach ($versiculos as $versiculo)
		{	
			$arr[$versiculo->Codigo]['Codigo']       = $versiculo->Codigo;
			$arr[$versiculo->Codigo]['Livro']        = utf8_encode($versiculo->Livro);
			$arr[$versiculo->Codigo]['Capitulo']     = $versiculo->Capitulo;
			$arr[$versiculo->Codigo]['Versiculo']    = $versiculo->Versiculo;			
			$arr[$versiculo->Codigo]['Texto']        = utf8_encode($versiculo->Texto);
			$arr[$versiculo->Codigo]['MaxVersiculo'] = $versiculo->MaxVersiculo;
		}		
		echo json_encode($arr);
	}
}