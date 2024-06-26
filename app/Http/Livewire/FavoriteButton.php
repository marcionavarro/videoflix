<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\User;
use Livewire\Component;

class FavoriteButton extends Component
{
    public $model;

    public function mount($model)
    {
        $this->model = $model;
    }

    public function toggleFavorite()
    {
        /** @var User $user */
        $user = auth()->user();
        $contenttFavorites = Content::find($this->model)->favorites();

        if (!$contenttFavorites->where('user_id', $user->id)->count()) {
            $contenttFavorites->create(['user_id' => $user->id]);
        } else {
            $contenttFavorites->where('user_id', $user->id)->delete();
        }
    }

    public function getFavoriteByUserProperty()
    {
        return Content::find($this->model)->favorites()->whereUserId(auth()->id())->count();
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
