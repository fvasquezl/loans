<?php

namespace App;

use App\Presenters\DepartmentPresenter;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'display_name', 'description'];

    public function users()
    {
        return $this->morphedByMany(User::class, 'departamentable');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'departamentable');
    }

    public function present()
    {
        return new DepartmentPresenter($this);
    }
}
