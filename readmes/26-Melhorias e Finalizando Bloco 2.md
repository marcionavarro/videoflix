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
