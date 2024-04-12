<?php
/*
   * classe Livro
   * Active Record para tabela Livro
   */
class Livro extends TRecord
{
     const TABLENAME = 'livros';
     
	 /**
	  * Retorna todas os Livros na Base de Dados
	  * @return collectoin
	  */     
     public static function getAll()
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Livro');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
	        $criteria->setProperty('order', 'Testamento, Codigo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 /**
	  * Retorna todas os Livros na Base de Dados
	  * @return collectoin
	  */     
     public static function getAllVT()
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Livro');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Testamento','=',1));
	        $criteria->setProperty('order', 'Testamento, Codigo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 /**
	  * Retorna todas os Livros na Base de Dados
	  * @return collectoin
	  */     
     public static function getAllNT()
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Livro');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Testamento','=',2));
	        $criteria->setProperty('order', 'Testamento, Codigo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
	 
	 public static function getLivro($livro = '')
     {
	 	 	// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Livro');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Livro','=',$livro));
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
			$livro2 = '';
			foreach ($collection as $livro1){$livro2 = $livro1;}
			
	        return $livro2;	       
	 }
	 
	 function getLivros()
     {
     		// carrega as categorias do banco de dados
	        TTransaction::open();
	        // instancia um repositório de Categorias
	        $repository = new TRepository('Livro');
	        // carrega todos os objetos
	        $criteria = new TCriteria;
			$criteria->add(new TFilter('Testamento','=',2));
	        $criteria->setProperty('order', 'Testamento, Codigo');
	        $collection = $repository->load($criteria);	     
	        TTransaction::close();
	        
	        return $collection;	       
     }
    
}