Guia de Execução do Projeto Laravel

Copie o arquivo de variáveis de ambiente:

cp .env.example .env

Configure as credenciais do banco de dados:

Abra o arquivo .env e edite as seguintes linhas:

DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha


Instale as dependências do PHP:
composer install

Gere a chave da aplicação:
php artisan key:generate

Execute as migrations:
php artisan migrate

Execute os seeders (opcional):
php artisan db:seed

Inicie o servidor local:
php artisan serve

Acesse o projeto no navegador:
http://127.0.0.1:8000
