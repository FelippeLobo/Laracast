<?php

    class QueryBuilder {

        protected $pdo;


        public function __construct(PDO $pdo){
            $this->pdo = $pdo;  // banco de dados conectado
        }

        function selectAll($table){

            $statement = $this->pdo->prepare("select * from $table"); //declarar o que será feito
        
            $statement->execute();  // executar
        
            return $statement->fetchAll(PDO::FETCH_CLASS); // retornar o que foi pedido
        
        }

        function selectOne($table, $id){

            $statement = $this->pdo->prepare("select * from $table where id = $id"); //declarar o que será feito
        
            $statement->execute();  // executar
        
            return $statement->fetchAll(PDO::FETCH_OBJ); // retornar o que foi pedido
        
        }

        function create($table, $parameters){
            
            
            $sql = sprintf(

                'insert into %s (%s) values (%s)',

                $table,

                implode(', ',array_keys($parameters)),

                ':' . implode(', :', array_keys($parameters))

            );
            
            try {

            $statement = $this->pdo->prepare($sql);         
            $statement->execute($parameters);  

            } catch (Exception $e){

                die('Ops, algo deu errado.' . $e->getMessage());
            }

        }

        function update($table, $parameters, $id){

            
            $keys = array_keys($parameters);
            $setAux = [];
            foreach($keys as $key)
            {
                $setAux[] = "{$key}=:{$key}";
            }  
            $sql = sprintf(
                    'update %s set %s where id = %s',
                    
                    $table,
                    implode(', ',$setAux),$id);
            
            try {

            $statement = $this->pdo->prepare($sql);         
            $statement->execute($parameters);  

            } catch (Exception $e){

                die('Ops, algo deu errado.' . $e->getMessage());
            }
        }

        function delete($table, $id){

            $sql = sprintf(

                    'delete from %s WHERE id = %s;',

                    $table,
                    $id
            );
            
            try {

                $statement = $this->pdo->prepare($sql);         
                $statement->execute($parameters);  
    
                } catch (Exception $e){
    
                    die('Ops, algo deu errado.' . $e->getMessage());
                }
        }
    }

        


    