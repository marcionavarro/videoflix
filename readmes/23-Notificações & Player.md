# 23. Notificações & Player

### 255 - Tabela Notificação
Comando para criar a migração da tabela de notificações  
`php artisan notifications:table`  

Rodar a migrate criada anteriormente  
`php artisan migrate`

### 256 - Classe de Notificação
`php artisan make:notification VideoProcessedNotification`

documentação  
[Canais de notificação](https://laravel.com/docs/8.x/notifications#specifying-delivery-channels)

### 258 - Disparando Notificações
Testando a classe de notificação  
```
Route::get('/notification', function (){
$user = User::first();
$user->notify(new VideoProcessedNotification());
dd($user);
});
```
Rodar o tinker  
`php artisan tinker`

`\DB::table('notifications')->get();`

````
> \DB::table('notifications')->get();
= Illuminate\Support\Collection {#6261
    all: [
      {#6274
        +"id": "4021a22f-babd-45fe-ab70-d9818d774e04",
        +"type": "App\Notifications\VideoProcessedNotification",
        +"notifiable_type": "App\Models\User",
        +"notifiable_id": 1,
        +"data": "{"message":"Testando notifica\u00e7\u00e3o"}",
        +"read_at": null,
        +"created_at": "2023-11-03 22:58:19",
        +"updated_at": "2023-11-03 22:58:19",
      },
    ],
  }
````

### 259 - Manipulando Notificações
Alguns comandos possiveis  

Disparando a notificação  
`$user->notify(new VideoProcessedNotification());`

Traz as notificações  
`$user->notifications`

Conta as notificações  
`$user->notifications->count()` 

Notificações lidas  
`$user->readNotifications` 

Notificações não lidas  
`$user->unReadNotifications` 

Pegar a ulitma notificação daquela collection  
`$user->unReadNotifications->first()`

Marcar notificação como lida
`$user->unReadNotifications->first()->marKAsRead()`

Buscando pelo id   
`$user->unReadNotifications()->where('id', '4021a22f-babd-45fe-ab70-d9818d774e04')->first()`

### 260 - Notificações no Processo do Job
Criar outra classe de notificação  
`php artisan make:notification WhenVideoProcessingHasFailedNotification`

### 262 - Ícone de Notificações Admin
[Ícones](https://heroicons.com/)

### 263 - Exibindo Notificações Admin
Criando componente livewire  
`php artisan make:livewire Notification`

### 265 - Criando Player
Criando o componente Player  
`php artisan make:livewire Player`

Componente Player clique [Clique aqui](https://codeexperts.com.br/cursos/meus-cursos/prime/laravel-mastery/aula/2083)  
Rotas Player clique [Clique aqui](https://codeexperts.com.br/cursos/meus-cursos/prime/laravel-mastery/aula/2083);

### 266 - Tela de Vídeos Conteúdo
Criando o componente da Criar de video  
`php artisan make:livewire Content/Video/CreateVideo`

Criando o componente da listagem de video  
`php artisan make:livewire Content/Video/ListVideo`

Criando o componente da Criar de video  
`php artisan make:livewire Content/Video/EditVideo`

Componente List Vídeo [Clique aqui](https://gist.github.com/NandoKstroNet/8c95034ddad63030f366b3b23742d013)  
Rotas Gerenciamento Vídeo [clique aqu](https://gist.github.com/NandoKstroNet/e2f2714d882b4c07f313c0118b4da4a5)

### 268 - Tela de Edição Vídeo

Componente Edit Vídeo [clique aqui](https://gist.github.com/NandoKstroNet/9795388e5dd02e6b150f147d73ae17de)

### 269 - Conclusões

Atrelamos notificações aos jobs dos videos, criar, listar e editar os videos do conteudo.






