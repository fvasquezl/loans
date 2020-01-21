<?php
namespace App\Presenters;

use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

class LoanPresenter extends Presenter
{

    public function loanTitle()
    {
        return new HtmlString(" <a class='text-decoration-none text-muted' href='" . route('admin.credits.show', $this->model->id) . "'>
         {$this->model->id}. {$this->model->title}</a>
        ");
    }

    public function publishedAt()
    {
        $date = optional($this->model->published_at)->format('M d Y');
        return new HtmlString("{$date}");
    }


    public function tags()
    {
        $categories = $this->model->tags
                        ->pluck('name')
                        ->map(function ($value) {
                            return "<a href='".route('tags.show',$value)."'> #$value</a>";
                        })->implode(', ');

        return new HtmlString("{$categories}");
    }

    public function category()
    {
        return new HtmlString("{$this->model->category->name}");
    }

    public function owner()
    {
        return new HtmlString("{$this->model->user->name}");
    }

    public function departments()
    {
        return $this
        ->model
        ->departments
        ->pluck('name')
        ->map(function($value){
            if($value->isEmpty()){
                return 'PUBLIC';
            }else{
                return $value;
            }
        });


        // ->pluck('name')->map(function($value){
        //         return  $value ? $value :'PUBLIC';
        // })->implode(', ');
    }

    //

    // public function notes()
    // {
    //     return $this->model->note ? $this->model->note->body : '';
    // }

    // public function tags()
    // {
    //     return $this->model->tags->pluck('name')->implode(' ,');
    // }
}
