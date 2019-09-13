# Teste para Programador Junior

Este teste tem como objetivo avaliar e diagnosticar algumas habilidades e competências técnicas desejadas no perfil de um Programador Junior.

## Problema

Com o HTML disponibilizado você deve aderir aos seguintes requisitos:

 **Requisitos funcionais**
 - Criar um "CRUD" que:
   - Permita cadastrar alunos e professores.
   - Os alunos possuem:
     - Nome
     - CPF
     - Curso
     - Email
     - 1..N Telefones 
   - Os professores possuem:
     - Nome
     - CPF
     - Titulação
     - E-mail
     - 1..N Telefones
   - Permita editar todas as informações dos alunos e professores com exceção do CPF.
   - Permita consultar professores e alunos cadastrados.
   - Permita remoção de professores e alunos cadastrados.
 - O CRUD deve impedir o cadastro de pessoas duplicadas
 - O CRUD deve permitir que uma pessoa seja professor e aluno.
 - O CRUD deve ter e apresentar um estado para quando não houver dados cadastrados (para alunos, professores ou ambos).
 
 **Requisitos não funcionais**
 - Os dados devem ser persistidos em um dos seguintes bancos de dados:
   - MySQL
   - PostgreSQL
   - SQLite
 - A implementação deve utilizar o paradigma de Orientação a Objetos
 - A implementação pode ser feita em qualquer linguagem de programação que atenda o requisito anterior.
 - O prazo de desenvolvimento da solução é de uma semana após o recebimento deste teste.
 - O código fonte deve ser disponibilizado em um repositório público do github.
 - Caso a estrutura de banco não seja construída pelo código da aplicação, deve ser adicionado ao projeto o código SQL do banco escolhido para construção da estrutura do banco.