# 22. Trabalhando com Filas
### 240 - A Job Class
Verificar os Comandos  
`php artisan | grep queue`

Criar classe Job  
`php artisan make:job VideoProcessingJob`

### 241 - Configurações de Filas
Configuração na pasta **config/queue.php**

### 243 - Jobs Assíncronos
Criar a migração  
`php artisan queue:table` 

Rodar a migrate  
`php artisan migrate`  

Mudar no .env em:  
**De** QUEUE_CONNECTION=sync  
**Para** QUEUE_CONNECTION=database

Processando Job, rodar no terminal  
`php artisan queue:work`

### 245 - Jobs Falhos via Terminal
Verificar jobs falhados no terminal  
`php artisan queue:failed`

Roda todos os Jobs falhados novamente  
`php artisan queue:retry all` 

Roda um job especifico pelo seu uuid  
`php artisan queue:retry 858719fe-034c-4a33-9e48-875f61d480df`  

Limpar todos os jobs falhos  
`php artisan queue:flush` 

### 246 - Modificações para Tabela Vídeos

Modificando a tabela de videos mas futuramente vc pode adicionar esses campos direto na migração de video.  
`php artisan make:migration alter_videos_table --table=videos`  
`php artisan migrate`

### 247 - Testes e Fix Vídeo
Limpando as tabelas  
`php artisan migrate:fresh` 

Limpando e rodando o seed  
`php artisan migrate:fresh --seed`

### 248 - Job para Processamento de Vídeo
Criar as pastas, videos e videos_processed em: **config/filesystems.php**  
``
'videos' => [
'driver' => 'local',
'root' => storage_path('app/videos'),
],
``  
``
'videos_processed' => [
'driver' => 'local',
'root' => storage_path('app/videos_processed'),
],
``

Rodar o Job  
`php artisan queue:work`

### 250 - Job para Thumb de Vídeo
Links de Referência  
[Export a frame from a video](https://github.com/protonemedia/laravel-ffmpeg#export-a-frame-from-a-video)  
[Download Sample Videos](https://sample-videos.com/)

Criar novo job  
`php artisan make:job CreateThumbFromAvideoJob`

### 251 - Categorizando Jobs por Fila
Criando Jobs para testes  
`php artisan make:job Test/PushJob`  
`php artisan make:job Test/TestJob`  
`php artisan make:job Test/DeployJob`

Para testar chame as classes em **routes/web.php**  
`\App\Jobs\Test\TestJob::dispatch()`  
`\App\Jobs\Test\PushJob::dispatch()->onQueue('deploy')`

Para rodar um Job categorizado e colocar qual deve vir primeiro  
`php artisan queue:work --queue=deploy,default`

### 252 - Mais opções do comando work
Comando de ajuda  
`php artisan queue:work --help`







