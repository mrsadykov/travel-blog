<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    /* делаем отношение */
    public function tags() {
        /*
         * первый аргумент - класс
         * второй аргумент - таблица, куда записывается
         * третий аргумент - внешний ключ зависит от текущей модели
         * 4 аргумент - с кем отношение
         */
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
}
