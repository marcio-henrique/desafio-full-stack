# desafio-full-stack

1) Comando para instalar as dependências do back-end:

        composer install --no-scripts

1) Comando para instalar as dependências do front-end:

        npm install

2) Copie o arquivo .env.example e renomeie para .env, edite de acordo com as configs do seu banco de dados
   e em seguida rode o seguinte comando para gerar a API_KEY:

        php artisan key:generate

3) Comando para enviar as migrações para o banco de dados

        php artisan migrate

4) Comando para iniciar o front-end

        npm run dev

5) Comando para iniciar o servidor na sua máquina, por padrão em "localhost:8000":

        php artisan serve
