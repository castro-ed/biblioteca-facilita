# Sistema de Gerenciamento de Biblioteca

Este é um sistema simples de gerenciamento de biblioteca desenvolvido em **Laravel 12 (PHP 8.2, MySQL)**. Ele permite gerenciar **usuários**, **livros**, **gêneros** e **empréstimos de livros** de forma organizada e intuitiva.

---

## ✅ Requisitos

- PHP 8.2+
- Composer
- MySQL
- Node.js e npm (para compilação do frontend)

---

## ⚙️ Instalação e Configuração

1. **Clone o repositório:**

```bash
git clone https://github.com/castro-ed/biblioteca-facilita.git biblioteca-app

Ou baixe o projeto diretamente.

2. **Acesse o diretório do projeto:**
cd biblioteca-app

3. **Instale as dependências do PHP via Composer:**
composer install

4. **Copie o arquivo de ambiente e configure:**
cp .env.example .env
Abra o arquivo .env e edite as variáveis do banco de dados:

DB_DATABASE=facilita_biblioteca
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

⚠️ Crie a base de dados facilita_biblioteca no MySQL antes de prosseguir.

5. **Gere a chave da aplicação:**
php artisan key:generate

6. **Execute as migrações:**
php artisan migrate
Isso criará as tabelas no BD.

7. **Instale as dependências de frontend (TailwindCSS e Vite):**
npm install

8. **Compile os assets:**
npm run dev

9. **Inicie o servidor de desenvolvimento Laravel:**
php artisan serve

10. **Uso da aplicação:**

    Dashboard: mostra estatísticas gerais como número total de livros, usuários e empréstimos (ativos, devolvidos, atrasados).

    Usuários: cadastrar, editar e remover usuários da biblioteca.

    Livros: adicionar novos livros, editar dados e acompanhar o status (Disponível ou Emprestado).

    Gêneros: cadastrar, editar ou excluir gêneros de livros.

    Empréstimos:

        Cadastrar novo empréstimo com data de devolução.

        Marcar empréstimo como Devolvido (libera o livro) ou Atrasado (quando a devolução não acontece no prazo).

        O sistema atualiza automaticamente o status do livro conforme o empréstimo.

     Obs.: Este sistema não possui login/autenticação, pois não foi exigido pelo teste técnico. Todas as funcionalidades estão acessíveis diretamente e busca simular um único usuário (bibliotecário) gerenciando seu sistema.

11. **Tecnologias e Ferramentas Utilizadas:**
    Laravel 12 (Framework PHP)

    PHP 8.2

    MySQL (banco de dados relacional)

    Blade (sistema de templates)

    TailwindCSS (estilização frontend)

    Vite (build de assets)

    HTML/CSS/JavaScript

    O código segue boas práticas de organização Laravel, com controllers separados, migrations organizadas, uso de relacionamentos Eloquent e comentários explicativos nos principais trechos.

12. **Considerações Finais:**
Este projeto foi desenvolvido como parte de um desafio técnico para avaliação de habilidades em backend Laravel. Ele cobre as principais funcionalidades de um sistema real de gerenciamento de biblioteca.

