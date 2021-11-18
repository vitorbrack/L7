<?php
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/Dao/DaoCliente.php';
include_once 'C:/xampp/htdocs/L7/projeto_L7-main-master/model/Cliente.php';

class ClienteController {
    
    public function inserirCliente($cep, $logradouro, 
            $numero, $complemento, $bairro, $cidade, $uf,
            $nome, $dtNascimento, $email, $senha, $cpf){
        
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        
        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setDtNascimento($dtNascimento);
        $cliente->setSenha($senha);
        $cliente->setEmail($email);
        $cliente->setCpf($cpf);
        $cliente->setFkEndereco($endereco);

        
        $daoCliente = new DaoCliente();
        return $daoCliente->inserir($cliente);
    }
    
    //método para atualizar dados de produto no BD
    public function atualizarCliente($idPessoa, $cep, $logradouro, 
    $numero, $complemento, $bairro, $cidade, $uf,
    $nome, $dtNascimento, $email, $senha, $cpf){
        $endereco = new Endereco();
        $endereco->setCep($cep);
        $endereco->setLogradouro($logradouro);
        $endereco->setNumero($numero);
        $endereco->setComplemento($complemento);
        $endereco->setBairro($bairro);
        $endereco->setCidade($cidade);
        $endereco->setUf($uf);
        
        $cliente = new Cliente();
        $cliente->setIdpessoa($idPessoa);
        $cliente->setNome($nome);
        $cliente->setDtNascimento($dtNascimento);
        $cliente->setSenha($senha);
        $cliente->setEmail($email);
        $cliente->setCpf($cpf);
        $cliente->setFkEndereco($endereco);
  

        
        $daoCliente = new DaoCliente();
        return $daoCliente->atualizarClienteDAO($cliente);
    }
    
    //método para carregar a lista de produtos que vem da DAO
    public function listarcliente(){
        $daoCliente = new DaoCliente();
        return $daoCliente->listarclientesDAO();
    }
    
    //método para excluir produto
    public function excluirCliente($id){
        $cliente = new Daocliente();
        return $cliente->excluirClienteDAO($id);
    }
    
    //método para retornar objeto produto com os dados do BD
    public function pesquisarClienteId($id){
        $daoCliente = new DaoCliente();
        return $daoCliente->pesquisarClienteIdDAO($id);
    }
    
    //método para limpar formulário
    public function limpar(){
        return $fr = new Cliente();
    }
}