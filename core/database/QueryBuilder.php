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

    public function verificaLogin($email, $senha){
        // Busca apenas pelo email
        $sql = 'SELECT * FROM usuarios WHERE email = :email';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['email' => $email]);

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            // Se encontrou o usuário, verifica a senha criptografada
            if ($user && password_verify($senha, $user->senha)) {
                return $user; // Login bem-sucedido
            }

            return false; // Email não existe ou senha incorreta
        }
        catch (Exception $e){
            die($e->getMessage());
        }
    }
}