# Upload de Currículos feito em Laravel


## Requisitos

PHP 7.3 ou superior

MySQL / MariaDB 10.3 superior ou compatível

## Copie o arquivo env.sample para .env e edite os seguintes conteúdos:

Trocando o database_here para o Nome do banco em: DB_DATABASE=database_here

Trocando o username_here para o Usuário do banco em: DB_USERNAME=username_here

Trocando o password_here para a Senha do banco em: DB_PASSWORD=password_here

Trocando o mailfrom_here para o E-mail de envio em: MAIL_FROM_ADDRESS=mailfrom_here

## Como executar

Na linha de comando digite php artisan serve 

Abra o navegador no endereço http://127.0.0.1:8000/

## Observações

Os currículos são salvos na pasta public/curriculos

O Envio de e-mail não é autenticado e usa o comando mail do PHP para enviar, foi pensando num uso dentro de uma hospedagem real nessa versão.



