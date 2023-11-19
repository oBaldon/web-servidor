# Projeto: Disciplina Desenvolvimento Web Servidor - 2023 / 2

## Avaliação: Avaliação Prática em Grupo

### Descrição
Este projeto consiste na criação de um sistema para gerenciar Listas de Compras, onde os usuários terão acesso por meio de login e senha para realizar diversas ações. Cada item deve estar associado a uma lista específica.

### Componentes
Até 4 alunos podem compor o grupo de trabalho.

### Observações
É permitido o uso de frameworks para o desenvolvimento deste projeto.

### Diagrama do Banco de Dados
### Tabelas:

- usuarios:
  - PK login
  - senha
  - email

- listas:
  - PK id
  - FK usuario_login
  - titulo
  - data

- itens:
  - PK id
  - FK lista_id
  - nome
  - quantidade
  - valor (o usuário pode optar por preencher ou não)

### Itens necessários

- (2,5 pontos) Controle de Usuário
- Login
  - Senha
  - Email
  - CRUD (Criar, Listar, Atualizar e Apagar)

- (3,0 pontos) Controle de Listas
  - Nome da Lista
  - Data
  - CRUD (Criar, Listar, Atualizar e Apagar)

- (3,0 pontos) Controle de Itens por Lista
  - Nome do Item
  - Quantidade
  - Valor (Usuário pode preencher ou não)
  - CRUD (Criar, Listar, Atualizar e Apagar)

- (1,5 pontos) Utilização de:
  - Classes
  - Namespaces
  - Autoload
