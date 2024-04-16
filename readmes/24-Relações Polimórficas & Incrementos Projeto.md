# 24. Relações Polimórficas & Incrementos Projeto

### 271 - Um pra Um Polimórfico

Criar a migration  
`php artisan make:migration create_images_table`

Rodar a migration  
`php artisan migrate`

Criando o model Image  
`php artisan make:model Image`

Criando relacionamento Polimorfico de Um para Um na Model **User** e na Model **Content**
eles poderão ter apenas uma imagem relacionada na tabela image.

```
public function image()
{
    return $this->morphOne(Image::class, 'imageable'); 
}
```

Na model Image ficará o codigo que conterá a ligação.

```
public function imageable()
{
    return $this->morphTo();
}
```

### 272 - Trabalhando com Um pra Um

Exemplo de Uso

````
Route::get(
    '/morphs',
    function () {
        // Find User
        //$user = User::find(1);

        // Find Content
        $content = Content::find(10);

        // Saving the morphOne relation
        $content->image()->create(['image' => 'image-' . rand(1, 30000)]);

        // Searching a image morphs
        $image = Image::find(2);

        return $image->imageable;
    }
);
````

### 273 - Um pra Muitos Polimórfico

`php artisan make:model Comment -m`

Rodar a migration  
`php artisan migrate`

Model Video & Content

````
public function comments()
{
    return $this->morphMany(Comment::class, 'commentable');
}
````

Model Comment

````
public function imageable()
{
    return $this->morphTo();
}
````

Exemplo de Uso

````
Route::get(
    '/morphs',
    function () {
        // Morphs 1 to Many
        // Find Content
//        $content = Content::find(10);
//        $content->comments()->create(['comment' => 'Testando comentário...']);

//        $video = Video::find(10);
//        $video->comments()->create(['comment' => 'Testando comentário v...']);

        return Comment::first()->commentable;

        return $video->comments;
    }
);
````
### 274 - Muitos pra Muitos Polimórfico
Criar Model Tag  
`php artisan make:model Tag -m`

Criar a tabela intemediária - Ligando tags, videos e conteudos.  
`php artisan make:migration create_taggable_table`  

migrations tags  
```
Schema::create('tags', function (Blueprint $table) {
    $table->id();
    $table->string('tag');
    $table->timestamps();
});
```

migrations taggables, aqui vai ter as ligações de muitos para muitos
```
Schema::create('tags', function (Blueprint $table) {
    $table->unsignedBigInteger('tag_id');
    $table->morphs('taggable');
});
```  
Executar a migration  
`php artisan migrate`  

Model Content e Video
```
public function tags()
{
    return $this->morphToMany(Tag::class, 'taggable');
}
```

Model Tag
```
protected $fillable = ['tag'];

public function videos()
{
    return $this->morphedByMany(Video::class, 'taggable');
}

public function contents()
{
    return $this->morphedByMany(Content::class, 'taggable');
}
```

### 275 - Trabalhando com Muitos pra Muitos

Exemplo de Uso

````
Route::get(
    '/morphs',
    function () {
        // Many To Many Morphs

        $tagsCreate = [
            ['tag' => 'acao'],
            ['tag' => 'aventura'],
            ['tag' => 'terror'],
            ['tag' => 'documentarios'],
            ['tag' => 'romance'],
            ['tag' => 'suspense'],
        ];

        // Tag::createMany($tagsCreate);

         /*$model = Video::find(10);
         $model->tags()->createMany($tagsCreate);*/

         /*$model = Content::find(10);
         $model->tags()->sync([1,2,3,4]);*/

        $model = Tag::find(1);
        // $model->videos()->sync([1,2,3,4]);

//        return $model->tags;
//        return $model->videos;
        return $model->contents;
    }
);
````
### 276 - Criando Conteúdos pro Usuário  

`` php artisan make:livewire Contents ``

[Arquivos de Ajuda](https://gist.github.com/NandoKstroNet/2082dd3bbcc6e568adf333f40bee159e)

### 277 - Modifições no Player do Projeto

[Link códigos incrementos player](https://gist.github.com/NandoKstroNet/07f1cc7086fe77832a54343101896226)

### 278 - Componente Criar Comentários

`php artisan make:livewire Comments/Create`

`php artisan make:livewire Comments/Comments`

`php artisan make:livewire Comments/Comment`

[Link camanda de view componente Criar Comentário](https://gist.github.com/NandoKstroNet/207699908f1d794fff581bd3acdff553)

### 279 - Iniciando Save de Comentário

