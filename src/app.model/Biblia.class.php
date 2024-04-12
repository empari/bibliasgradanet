<?php
/*
   * classe Biblia
   * Active Record para tabela Biblia   */
class Biblia extends TRecord
{
     const TABLENAME = 'biblia';
	 
	  /**
	  * Retorna todas os versiculos na Base de Dados
	  * @return collectoin
	  */     
     public static function getAll()
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Biblia');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
	        $criteria->setProperty('order', 'Livro, Capitulo, Versiculo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 public static function getLivros($livro = '')
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Biblia');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Livro','like _utf8',$livro));
	        $criteria->setProperty('order', 'Livro, Capitulo, Versiculo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 public static function getVersiculos($livro = '', $cap = 0)
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Biblia');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Livro','=',$livro));
			$criteria->add(new TFilter('Capitulo','=',$cap));
	        $criteria->setProperty('order', 'Livro, Capitulo, Versiculo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 public static function getVersiculosBusca($s = '')
     {
	        TTransaction::open();
	        $repository = new TRepository('Biblia');
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Texto','like', '%'.$s.'%'));
	        $criteria->setProperty('order', 'Codigo, Livro, Capitulo, Versiculo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
}