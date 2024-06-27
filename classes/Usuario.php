<?php

class Usuario
{
    private $conn;

    private $table_name = "usuario"; 


    public function __construct($db){
        $this->conn = $db;
    }

    public function registrar($nome, $sexo, $fone, $email, $senha){
        $query = "INSERT INTO ".$this->table_name." (nome, sexo, fone, email, senha) VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
        $stmt->execute([$nome, $sexo, $fone, $email, $hashed_password]);
        return $stmt; 
    }
    
    public function login($email, $senha){
        $query = "SELECT * FROM  ".$this->table_name." WHERE email=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($senha, $usuario['senha'])){
            return $usuario;
        }
        return false;
    }

    public function atualizar($id, $nome, $sexo, $fone, $email ){
        $query = "UPDATE ".$this->table_name." SET nome = ?, sexo = ?, fone = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute ([$nome, $sexo, $fone, $email, $id]);
        return $stmt;
    }

    public function deletar($id){
        $query = "DELETE FROM ".$this->table_name." WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }
    
/*    public function ler(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
         return $stmt;
    }
*/
    
    public function ler($search = "", $order_by = "") {
        $query = "SELECT * FROM usuario";
        $conditions = [];
        $params = [];

        if ($search) {
           $conditions[] = "(nome LIKE :search OR email LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        if ($order_by === 'nome') {
            $query .= " ORDER BY nome";
        } elseif ($order_by === 'sexo') {
            $query .= " ORDER BY sexo";
        }

        if (count($conditions) > 0) {
            $query .= " WHERE " . implode(' AND ', $conditions);
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }

    
    public function lerPorId($id){
        $query = "SELECT * FROM ".$this->table_name." WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function criar($nome, $sexo, $fone, $email, $senha){
        return $this->registrar($nome, $sexo, $fone, $email, $senha);
    }
    public function gerarCodigoVerificacao($email) {
        $codigo =
        substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 10);
        $query = "UPDATE " . $this->table_name . " SET
        codigo_verificacao = ? WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$codigo, $email]);
        return ($stmt->rowCount() > 0) ? $codigo : false;
        }
        public function verificarCodigo($codigo) {
            $query = "SELECT * FROM " . $this->table_name . " WHERE
            codigo_verificacao = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$codigo]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            }
            public function redefinirSenha($codigo, $senha) {
                $query = "UPDATE " . $this->table_name . " SET senha = ?,
                codigo_verificacao = NULL WHERE codigo_verificacao = ?";
                $stmt = $this->conn->prepare($query);
                $hashed_password = password_hash($senha, PASSWORD_BCRYPT);
                $stmt->execute([$hashed_password, $codigo]);
                return $stmt->rowCount() > 0;
                }
    
}
?>
