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
