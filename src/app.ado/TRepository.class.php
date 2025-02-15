<?php
/*
 * classe TRepository
 * esta classe prov� os m�todos necess�rios para manipular cole��es de objetos.
 */
final class TRepository
{
    private $class; // nome da classe manipulada pelo reposit�rio
    
    /* m�todo __construct()
     * instancia um Reposit�rio de objetos
     * @param $class = Classe dos Objetos
     */
    function __construct($class)
    {
        $this->class = $class;
    }
    
    /*
     * m�todo load()
     * Recuperar um conjunto de objetos (collection) da base de dados
     * atrav�s de um crit�rio de sele��o, e instanci�-los em mem�ria
     * @param $criteria = objeto do tipo TCriteria
     */
    function load(TCriteria $criteria)
    {
        
        // instancia a instru��o de SELECT
        $obj = new $this->class;
        $sql = new TSqlSelect;
        $sql->addColumn('*');
        $sql->setEntity(constant($this->class.'::TABLENAME'));
        //$sql->setEntity($obj->getEntity());
        
        // atribui o crit�rio passado como par�metro
        $sql->setCriteria($criteria);
        
        // obt�m transa��o ativa
        if ($conn = TTransaction::get())
        {   
			// registra mensagem de log
            TTransaction::log($sql->getInstruction());
			            
            // executa a consulta no banco de dados          
            $result= $conn->Query($sql->getInstruction());
            $results = array();
            
            if ($result)
            {
                // percorre os resultados da consulta, retornando um objeto
                while ($row = $result->fetchObject($this->class))
                {
                    // armazena no array $results;
                    $results[] = $row;
                }
            }
            return $results;
        }
        else
        {
            // se n�o tiver transa��o, retorna uma exce��o
            throw new Exception('N�o h� transa��o ativa!!!');
        }
    }
    
    /*
     * m�todo delete()
     * Excluir um conjunto de objetos (collection) da base de dados
     * atrav�s de um crit�rio de sele��o.
     * @param $criteria = objeto do tipo TCriteria
     */
    function delete(TCriteria $criteria)
    {
        // instancia instru��o de DELETE
        $sql = new TSqlDelete;
        $sql->setEntity(constant($this->class.'::TABLENAME'));
        
        // atribui o crit�rio passado como par�metro
        $sql->setCriteria($criteria);
        
        // obt�m transa��o ativa
        if ($conn = TTransaction::get())
        {
            // registra mensagem de log
            TTransaction::log($sql->getInstruction());
            // executa instru��o de DELETE
            $result = $conn->exec($sql->getInstruction());
            return $result;
        }
        else
        {
            // se n�o tiver transa��o, retorna uma exce��o
            throw new Exception('N�o h� transa��o ativa!!');
            
        }
    }
    
    /*
     * m�todo count()
     * Retorna a quantidade de objetos da base de dados
     * que satisfazem um determinado crit�rio de sele��o.
     * @param $criteria = objeto do tipo TCriteria
     */
    function count(TCriteria $criteria)
    {
        
        // instancia instru��o de SELECT
        $sql = new TSqlSelect;
        $sql->addColumn('count(*)');
        $sql->setEntity(constant($this->class.'::TABLENAME'));
        
        // atribui o crit�rio passado como par�metro
        $sql->setCriteria($criteria);
        
        // obt�m transa��o ativa
        if ($conn = TTransaction::get())
        {
            // registra mensagem de log
            TTransaction::log($sql->getInstruction());
            
            // executa instru��o de SELECT
            $result= $conn->Query($sql->getInstruction());
            if ($result)
            {
                $row = $result->fetch();
            }
            // retorna o resultado
            return $row[0];
        }
        else
        {
            // se n�o tiver transa��o, retorna uma exce��o
            throw new Exception('N�o h� transa��o ativa!!');
        }
    }
}
?>