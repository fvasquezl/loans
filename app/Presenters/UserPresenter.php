<?php
namespace App\Presenters;

use Illuminate\Support\HtmlString;

class UserPresenter extends Presenter 
{
    public function userCreatedat()
    {
        return new HtmlString("{$this->model->created_at->diffForHumans()}");
    }   

    public function userPostCount()
    {
        return new HtmlString("{$this->model->posts()->count()}");
    }
}