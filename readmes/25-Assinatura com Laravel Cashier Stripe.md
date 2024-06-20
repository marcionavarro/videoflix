# 25-Assinatura com Laravel Cashier Stripe

### 285 - Introdução 
[Laravel Cashier (Stripe)](https://laravel.com/docs/9.x/billing)

### 286 - Instalando e Configurando Cashier
`composer require laravel/cashier 13.*`

Se você quiser Trazer os pacotes para dentro do seu projeto (Apenas para verificar as publicações)  
`php artisan vendor:publish`

Rodar migração  
`php artisan migrate`

Adicionar no .env

````
STRIPE_KEY=  
STRIPE_SECRET=  
CASHIER_CURRENCY=brl  
CASHIER_CURRENCY_LOCALE=pt_BR  
CASHIER_LOGGER=stack  
````
### 288 - Component Checkout

`php artisan make:livewire Subscriptions/Checkout`

### 289 - Entendendo a cobrança da assinatura

[assinatura-com-laravel-cashier-stripe](https://gist.github.com/NandoKstroNet/1d217a3ee99d7f8f78c6ec3723dbe7e4)

### 290 - Realizando a Cobrança

Numero do Cartão de crédito Teste

`4111 1111 1111 1111 1230 123 65056`
