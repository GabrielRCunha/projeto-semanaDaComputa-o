<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parametros)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parametros)),
            ':' . implode(', :', array_keys($parametros))
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // MÉTODO VULNERÁVEL - USADO PARA DEMONSTRAÇÃO DE SQL INJECTION
    public function verificaLogin($email, $senha){
        // CONCATENAÇÃO DIRETA - VULNERÁVEL A SQL INJECTION!
        $sql = "SELECT * FROM usuarios WHERE email = '" . $email . "' AND senha = '" . $senha . "'";

        // Exibe a query para fins educacionais/debugging
        echo "<div style='background: #f0f0f0; padding: 10px; margin: 10px; border: 1px solid #ccc;'>";
        echo "<strong>Query executada:</strong><br>";
        echo "<code>" . htmlspecialchars($sql) . "</code>";
        echo "</div>";

        try {
            $stmt = $this->pdo->query($sql);
            
            if ($stmt) {
                $user = $stmt->fetch(PDO::FETCH_OBJ);
                return $user;
            }
            
            return false;
        }
        catch (Exception $e){
            die("Erro SQL: " . $e->getMessage());
        }
    }

    // MÉTODO SEGURO - MOSTRA A FORMA CORRETA (use para comparação)
    public function verificaLoginSeguro($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'email' => $email,  
                'senha' => $senha
            ]);

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            return $user;
        }
        catch (Exception $e){
            die($e->getMessage());
        }
    }
}