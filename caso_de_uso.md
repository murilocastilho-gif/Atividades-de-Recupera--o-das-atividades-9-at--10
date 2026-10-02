# Diagrama de Caso de Uso

O diagrama abaixo representa as interações do utilizador (Administrador/Funcionário do Mercado) com o Sistema de Gestão de Estoque.

```mermaid
usecaseDiagram
    actor Funcionário as "Funcionário do Mercado"
    
    package "Sistema de Gestão de Estoque" {
        usecase UC1 as "Cadastrar Produto"
        usecase UC2 as "Visualizar Produtos"
        usecase UC3 as "Editar Produto"
        usecase UC4 as "Excluir Produto"
    }
    
    Funcionário > UC1
    Funcionário > UC2
    Funcionário > UC3
    Funcionário > UC4