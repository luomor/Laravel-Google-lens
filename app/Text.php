<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    //
    use Notifiable;
    protected $table = 'text';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_file_path', 'image_file_content', 'user_id',
    ];

}
