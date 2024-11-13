<?php

class Cadastro {
    public $conexao;
    public $declara;

    public function __construct($url = "localhost", $user = "root", $pass = "", $db_name = "vagas") { 
        try {
        $this->conexao = new PDO("mysql:dbname=$db_name;host=$url", $user, $pass);
         $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $p) {
            echo "Erro em conexão: " . $p->getMessage();
        }
    }

    public function Cadastrar($nome_e, $num_zap, $email, $descricao, $curso) { 
        try {
        $this->declara = $this->conexao->prepare("INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso) 
         VALUES (:nome_empresa, :numero_whatsapp, :email_contato, :descritivo_vaga, :curso);");
        $this->declara->execute([
        ':nome_empresa' => $nome_e,
        ':numero_whatsapp' => $num_zap,
        ':email_contato' => $email,
        ':descritivo_vaga' => $descricao,
        ':curso' => $curso,
        ]);
        } catch(PDOException $p) {
        echo "Falha" . $p->getMessage();
        }
        }

    public function Excluir($id) {  
        try {
        $this->declara = $this->conexao->prepare("DELETE FROM vagas WHERE id = :id");
        $this->declara->execute([
        ':id' => $id
        ]);
        } catch(PDOException $p) {
        echo "Falha" . $p->getMessage();
        }
        }  

        public function __destruct() {  
        $this->conexao = null;
        }
    }

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'Cadastrar') {
    $nome_e = $_POST['nome_empresa'];
    $num_zap = $_POST['numero_whatsapp'];
    $email = $_POST['email_contato'];
    $descricao = $_POST['descritivo_vaga'];
    $curso = $_POST['curso'];
    $cadastro = new Cadastro();
    $cadastro->Cadastrar($nome_e, $num_zap, $email, $descricao, $curso);
    header("Location: ../home.php");
    exit();
    }

if (isset($_POST['action']) && $_POST['action'] === 'Excluir' && isset($_POST['id_vaga'])) {
    $id_vaga = $_POST['id_vaga'];
    $cadastro = new Cadastro();
    $cadastro->Excluir($id_vaga);
    header("Location: ../home.php");
    exit();
    }

?>