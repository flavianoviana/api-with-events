<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the project

This is a simple project to demonstrate the operation of an API in Laravel that uses asynchronous processing.

In this project I am using:

- Migration
- Model
- Request Validation
- Controller
- Json Response
- Routes
- Events
- Listeners
- Queues

## Application Flow

It is necessary to create a user so that it is possible to obtain the authentication token that will be requested by the **customer-store** endpoint. For that,
use the **user-store** endpoint, where the following parameters must be passed: name, password and email (the email must be unique among the users) and it will be
returned the user token that was created.

With the token created, the **customer-store** endpoint must be called, passing the following parameters: name, email, phone and date_of_birth (YYYY-MM-DD format). The way
authentication method is **Bearer Token**.

Once the request is sent, the controller validates the request data and if the validation is correct, the **CustomerStoreEvent** event is triggered.
The **CustomerStoreListener** listener will execute every time the **CustomerStoreEvent** event is triggered. The listener is configured to run
through a **default** queue, that is, the request will be received by the controller, but will not necessarily be executed at the same time, as it will be sent
to the queue.

## Installation Instructions

- composer install
- php artisan migrate

The project makes use of asynchronous processing, so it is necessary to activate the queue through the command:

- php artisan queue:listen

## Routes

- /api/v1/user-store
- /api/v1/customer-store

## Sobre o Projeto

Esse é um simples projeto para demonstrar o funcionamento de uma API em Laravel que utiliza processamento assincrono.

Nesse projeto estou utilizando:

- Migration
- Model
- Request Validation
- Controller
- Json Response
- Routes
- Events
- Listeners
- Queues

## Fluxo da Aplicação

É necessário criar um usuário para que seja possível obter o token de autenticação que será requisitado pelo endpoint **customer-store**. Para isso,
utilize o endpoint **user-store**, onde deverão ser passados os seguintes parâmetros: name, password e email (o email deverá ser único dentre os usuários) e será
devolvido o token do usuário que foi criado.

Com o token criado, deverá ser chamado o endpoint **customer-store**, passando os seguintes parâmetros: name, email, phone e date_of_birth (formato YYYY-MM-DD). O modo
de autenticação é **Bearer Token**.

Uma vez que a requisição é enviada, o controller valida os dados da request e caso a validação esteja correta, é disparado o evento **CustomerStoreEvent**. 
O listener **CustomerStoreListener** irá executar toda vez que o evento **CustomerStoreEvent** for disparado. O listener está configurado para ser executado
através de fila **default**, ou seja, a requisição será recebida pelo controller, mas não necessariamente será executada no mesmo instante, pois será enviada 
para a fila.

## Instruções de Instalação

- composer install
- php artisan migrate

O projeto faz uso de processamento assíncrono, para que isso é necessário ativar a fila através do comando:

- php artisan queue:listen

## Rotas

- /api/v1/user-store
- /api/v1/customer-store


