# 26-Melhorias e Finalizando Bloco 2

### 296 - Iniciando Componente Favoritar

`php artisan make:model Favorite -m`

`php artisan make:livewire FavoriteButton`

### 297 - Favoritando Conteúdo
`php artisan migrate`

### 301 - Adicionando Link Videos Conteúdo
`php artisan queue:work`

### 302 - Atualizando Componente Icone Notificações
`php artisan make:livewire NotificationIcon`


Verifica em storage app  
no phpstorm clique com o botão direito -> Mark Directory as -> Exclusion  
para o php não ficar indexando esta pasta

### 303 - Falando sobre Wire Poll

[GIST componenete Progresso Processamento Vídeo](https://gist.github.com/NandoKstroNet/9451d414197595258f6e34b76d4ea2cd)

`php artisan make:livewire Content/Video/SingleVideoProcessedProgress`

### 305 - Aplicando Controle ao Admin
`php artisan make:migration alter_users_table_add_collumn_role --table=user`

`php artisan migrate`

`php artisan make:middleware CheckIfUserIsAnAdmin`

### 310 - Agrupando Filmes e Séries

`php artisan tinker`

`\App\Models\Content::all()`

`\App\Models\Content::all()->groupBy('type')`

GIST código view componente Meus Conteúdos: [clique aqui](https://gist.github.com/NandoKstroNet/d3027be2e2dda49bd2ef4c6456b78473).

### 311 - Fila em Cadeia

`php artisan make:job Order/ProcessingOrder`

`php artisan make:job Order/MakePaymentOrder`

`php artisan make:job Order/NotifyUserAboutPaymentOrder`

`php artisan queue:work`

### 312 - Fila em Lotes

`php artisan queue:batches-table`

`php artisan migrate`

`php artisan queue:work`

### 316 - Área Minha Assinatura

GIST Componente Customer Subscription [clique aqui](https://gist.github.com/NandoKstroNet/d4a9c33aea473959e5bc63ec18801e72).  
GIST Componente Cancel Subscription [clique aqui](https://gist.github.com/NandoKstroNet/0b72f84437055678f1aabcd3fd2ad954).
