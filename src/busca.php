<?php
echo "<div id=\"lerbuscas\">";
echo "<h2>Resultados para: ". $_GET['s'] ."</h2>";

$livros = Biblia::getVersiculosBusca($_GET['s']);
if ($livros){
	$resultados = count($livros);
	echo "<span id=\"resultados\">Foram encontrados {$resultados} resultado(s).</span><br><br>";
	foreach ($livros as $cap){			
		$txt = str_ireplace($_GET['s'], "<span id=\"destaque\">{$_GET['s']}</span>", $cap->Texto);
		echo "<strong><a href=\"/?livro=". $cap->Livro ."&amp;cap=". $cap->Capitulo ."\">". $cap->Livro ." ". $cap->Capitulo .":". $cap->Versiculo ."</a></strong> ". $txt ."<br>";		
	}
}else{
	echo "<span id=\"resultados\">N&atilde;o foi encontrado nenhum resultado.</span><br><br>";
}

echo "</div>";