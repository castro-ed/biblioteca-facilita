# Sistema de Gerenciamento de Biblioteca

Este é um sistema simples de gerenciamento de biblioteca desenvolvido em Laravel 12 (PHP 8.3, MySQL). Ele permite gerenciar usuários, livros, gêneros e empréstimos de livros.

## Requisitos

- PHP 8.3+
- Composer
- MySQL
- Node.js e npm (para compilação do frontend)

## Instalação e Configuração

1. Clone o repositório:
git clone https://seu-repositorio.git biblioteca-app

*Ou baixe o projeto diretamente.*
2. Navegue até o diretório do projeto:
cd biblioteca-app

3. Instale as dependências do PHP via Composer:
composer install

4. Copie o arquivo de exemplo de ambiente e configure:
cp .env.example .env
Abra o arquivo `.env` e configure as variáveis de ambiente do banco de dados:
DB_DATABASE=biblioteca_db DB_USERNAME=seu_usuario DB_PASSWORD=sua_senha

*Certifique-se de criar uma base de dados `biblioteca_db` no MySQL e ajustar usuário/senha conforme seu ambiente.*

5. Gere a chave da aplicação Laravel:
php artisan key:generate

6. Rode as migrações para criar as tabelas iniciais:
php artisan migrate

Isso criará as tabelas.

7. Instale as dependências de frontend (TailwindCSS, Vite, etc):
npm install

8. Compile os assets (CSS/JS):
npm run dev


9. Inicie o servidor de desenvolvimento Laravel:
php artisan serve

10. Acesse a aplicação via navegador no endereço acima. Você deverá ver o Dashboard com as estatísticas.

## Uso da Aplicação

- **Dashboard**: mostra números totais de livros, usuários e empréstimos (ativos, devolvidos, atrasados).
- **Usuários**: permite cadastrar novos usuários, editar ou remover existentes.
- **Livros**: gerencia o catálogo de livros, incluindo título, autor, número de registro e gênero.
- **Empréstimos**: registre quando um usuário pega um livro emprestado, informando data de devolução. Após registrar:
- O livro emprestado muda automaticamente para status "Emprestado".
- Na lista de empréstimos, você pode marcar devoluções (o que retorna o livro ao status "Disponível") ou marcar como atrasado.
- **Gêneros**: permite cadastrar, editar ou excluir um novo gêneros.

*Obs:* Não há sistema de login; todas as funcionalidades estão expostas sem autenticação, uma vez que não era requisito do desafio implementar autenticação.

## Tecnologias e Ferramentas

- Laravel 12 (Framework PHP)
- PHP 8.2
- MySQL (via Eloquent ORM)
- Blade Templating
- TailwindCSS (estilização frontend)
- Vite (construção de assets)
- HTML/CSS/JS

O código segue boas práticas de organização do Laravel, e inclui comentários explicativos nos pontos principais para auxiliar na compreensão e manutenção.

## Considerações Finais

Este projeto foi desenvolvido como parte de um desafio técnico. Ele cobre as funcionalidades básicas de um gerenciamento de biblioteca.
