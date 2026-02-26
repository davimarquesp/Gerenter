# Gerenciador de Projetos (Laravel + MySQL)

Sistema em Laravel para cadastro, listagem, atualização e exclusão de projetos.
Inclui autenticação (Login/Signup) usando Email + CPF, dashboard com gráfico e perfil do usuário.

## Funcionalidades
- Autenticação:
  - Cadastro (nome, email, cpf)
  - Login (email + cpf)
  - Logout
- Dashboard:
  - Gráfico de projetos cadastrados por mês
  - Menu lateral (Dashboard, Cadastrar, Listar, Perfil)
- Projetos (CRUD):
  - Criar projeto (nome, data início/fim, descrição, tecnologias)
  - Listar projetos
  - Atualizar projeto
  - Excluir projeto
- Perfil:
  - Atualizar nome, email e cpf

## Requisitos
- PHP 8.2+
- Composer
- Node.js + NPM
- MySQL

## Como rodar o projeto localmente

### 1) Clonar o repositório
```bash
git clone https://github.com/SEU_USUARIO/SEU_REPO.git
cd SEU_REPO
