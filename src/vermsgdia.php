<?php
$id  = rand(4,587);
TTransaction::open();
$msg = new Mensagem($id);
TTransaction::close();
if ($msg){
	echo "<div id=\"msgdia\"><h2>Mensagem do Dia</h2>";
	echo "<p>";
		echo $msg->Texto;
		echo "<br>"; 
		echo "<i>".$msg->Capitulo."</i>";
	echo "</p></div>";
}	
