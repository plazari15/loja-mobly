# Teste Mobly 

Desenvolvido por: Pedro Abucarma Lazari

Desenvolvi este teste buscando utilizar o máximo de recursos possíveis e contemplando a maior quantidade de itens extras possíveis.

Durante o processo de desenvolvimento, optei por utilizar alguns pacotes que auxiliaram o desenvolvimento no prazo que tinha para conclusão.

Framework utilizado: Laravel 5.7

Pacotes Utilizados:

- [ https://github.com/jeroennoten/Laravel-AdminLTE]

- [https://github.com/lazychaser/laravel-nestedset]

- [https://github.com/lazychaser/laravel-nestedset]

- [https://github.com/lazychaser/laravel-nestedset]


## Como Instalar o Projeto

Desenvolvido utilizando Docker e as Imagens do Ambientum [https://github.com/ambientum/ambientum] 

1. basta executar o comando `docker-compose up -d` para executar e instalar os containers.
2. Copie o arquivo .env.example, ele já contem as variáveis utilizadas no ambiente do Docker.
3.  Acesse o container com o comando `docker exec -it mobly-app bash` e execute o comando `php artisan migrate`
4. Para facilitar, criei algumas seeds e para isso, só rodar o comando `php artisan db:seed`


