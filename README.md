# Sistema de Gestão de Produtos - Mercado

Este projeto foi desenvolvido como atividade de recuperação (Atividades 9 e 10). O objetivo é criar um Sistema de Gestão de Produtos para controlar o estoque de um mercado.

## Tecnologias Utilizadas
- PHP (Backend)
- MySQL (Banco de Dados)
- HTML (Interface)

## Estrutura do Banco de Dados
A tabela `produtos` é composta pelos campos:
- `id` (INT, Primary Key, Auto Increment)
- `nome` (VARCHAR)
- `categoria` (VARCHAR)
- `descricao` (TEXT)
- `preco` (DECIMAL)
- `quantidade` (INT)
- `data_validade` (DATE)

## Funcionalidades
- **Cadastrar**: Inserção de novos produtos no estoque.
- **Listar/Visualizar**: Exibição de todos os produtos com formatação de preços e datas.
- **Editar**: Atualização das informações de um produto existente.
- **Excluir**: Remoção de um produto do estoque.

O sistema utiliza **Prepared Statements** (via MySQLi) para todas as operações de banco de dados, garantindo segurança contra SQL Injection, além de validação de dados no backend.

## Instalação e Execução
1. Importe o arquivo `banco.sql` no seu servidor MySQL (ex: phpMyAdmin).
2. Coloque os arquivos do projeto no diretório raiz do seu servidor web (ex: `htdocs` no XAMPP).
3. Se necessário, ajuste as credenciais de conexão no arquivo `conexao.php` (`$user`, `$pass`).
4. Acesse o sistema através do navegador web (ex: `http://localhost/sua-pasta/index.php`).