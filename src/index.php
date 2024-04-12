<?php
date_default_timezone_set('America/Sao_Paulo');

include_once "autoload.php";
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="pt-BR">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="pt-BR">
<!--<![endif]-->
<head>
    
<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Bíblia Sagrada | Net</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="css/styles.css" rel="stylesheet" type="text/css" />

<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
<meta name="description" content="A Bíblia Sagrada Online é uma versão completa da Bíblia em Português com todos os livros, capítulos e versículos bíblicos"/>
<meta name="keywords" content="biblia,sagrada,envangelica,online"/>
<link rel="canonical" href="http://www.bibliasagradanet.com.br/"/>

<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114325283-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114325283-2');
</script>


<!-- Script Aumentar/Diminuir Fonte -->
<script language="Javascript" type="text/Javascript">
//Specify affected tags. Add or remove from list:
var tgs = new Array( 'div' );
//Specify spectrum of different font sizes:
var szs = new Array( 'xx-small','x-small','small','medium','large','x-large','xx-large' );
var startSz = 2;

function ts( trgt,inc ) {
	if (!document.getElementById) return
	var d = document,cEl = null,sz = startSz,i,j,cTags;
	sz += inc;
	if ( sz < 0 ) sz = 0;
	if ( sz > 6 ) sz = 6;
	startSz = sz;
	if ( !( cEl = d.getElementById( trgt ) ) ) cEl = d.getElementsByTagName( trgt )[ 0 ];

	cEl.style.fontSize = szs[ sz ];

	for ( i = 0; i < tgs.length; i++ ) {
		cTags = cEl.getElementsByTagName( tgs[ i ] );
		for ( j = 0; j < cTags.length; j++ ) cTags[ j ].style.fontSize = szs[ sz ];
	}
}
</script>
<!-- Fim Script Aumentar/Diminuir Fonte -->
</head>
<body>
    
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/" title="Ir para o in�cio">Bíblia Sagrada | Net</a></h5>
        <div id="busca">
            <form action="" method="get" class="form-inline">
                <div class="form-label-group">
                    <input type="text" name="s" value="" id="s" class="form-control " placeholder="o que deseja encontrar?" required autofocus/>
                    <button onclick="this.form.submit();" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>


    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <p class="lead">A Bíblia Sagrada Online é uma versão completa da Bíblia em Português com todos os livros, capítulos e versículos bíblicos.</p>
    </div>

<div class="container">
    <div id="topo">
    	<div class='text-font-button-area'>
    		<a href="javascript:ts('body',1)" title="Aumentar a fonte"><img src="img/aumentar_txt.png" alt="+A" border="0"/></a> 
    		<a href="javascript:ts('body',-1)" title="Diminuir a fonte"><img src="img/diminuir_txt.png" alt="-A" border="0"/></a>
    	</div>
    </div>
    
    <?php
    if (isset($_GET['s'])){
    	if ($_GET['s'] <> ''){
    		include 'busca.php';
    	}
    }
    
    if (!isset($_GET['livro']) && !isset($_GET['s'])){
    	include 'vermsgdia.php';
    }else{
    	include 'vercapitulo.php';
    }
    ?>
    <div class="row">
        <div id="verVT">
            <h2>Velho Testamento</h2>
            <?php
                $livros = Livro::getAllVT();
            	if ($livros){
            		foreach ($livros as $livro){	
            			echo "<a href=\"/?livro=". $livro->Livro ."\">". $livro->Nome ."</a><br/>";
            		}
            	}
            ?>
        </div>
        
        <div id="verNT">
            <h2>Novo Testamento</h2>
            <?php
                $livros = Livro::getAllNT();
            	if ($livros)
            	{
            		foreach ($livros as $livro)
            		{	
            			echo "<a href=\"/?livro=". $livro->Livro ."\">". $livro->Nome ."</a><br/>";
            		}
            	}
            ?>
        </div>
    </div>
    
    
    
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="/android-icon-48x48.png" alt="" width="48" height="48">
            <small class="d-block mb-3 text-muted">Bíblia Sagrada Net&copy; <?php echo date('Y') ?></small>
          </div>
          <div class="col-6 col-md">
            
          </div>
          <div class="col-6 col-md">
            
          </div>
          <div class="col-6 col-md">
            <small class="text-muted">
                Desenvolvido com
                <img src="/img/heart.gif" alt="" width="32" height="32"> por <br/>
                <a href="https://www.empari.com.br" target="_blank"><strong>Empari Global Innovation</strong></a>
            </small>
          </div>
        </div>
    </footer>
    
</div>    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>