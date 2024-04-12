<div class="row">
<?php
$livro = Livro::getLivro($_GET['livro']);

if (isset($_GET['cap'])){
	echo "<div id=\"lercapitulo\">";
	echo "<h2>".$livro->Nome." | Capítulo ". $_GET['cap'] ."</h2>";
	$livros = Biblia::getVersiculos($livro->Livro, $_GET['cap']);
	if ($livros){
		foreach ($livros as $cap){	
			if ($cap->Versiculo == 1){
				echo "<strong>".$cap->Versiculo."</strong> <span id=\"capitulado\">". substr($cap->Texto,1,1) ."</span>". substr($cap->Texto,2,5000)  ."<br>";
			} else {
				echo "<strong>".$cap->Versiculo."</strong> ". $cap->Texto ."<br>";
			}
		}
	}
	echo "</div>";
}

echo "<hr/><div id=\"vercapitulos\" class=\"paginacao\">";
echo "<h2>".$livro->Nome."</h2>";
$livros = Biblia::getLivros($livro->Livro);
if ($livros)
{
	echo "<p>{$livro->Capitulos} Capítulos e {$livro->Versiculos} Versículos</p>";
	$capitulo = 0;
	foreach ($livros as $cap)
	{	
		if ($capitulo <> $cap->Capitulo) {
			echo "<a href=\"/?livro=". $cap->Livro ."&amp;cap=". $cap->Capitulo ."\">". $cap->Capitulo ."</a> ";
			$capitulo = $cap->Capitulo;
		}
	}
}

echo "</div>";
?>
<hr/>
</div>