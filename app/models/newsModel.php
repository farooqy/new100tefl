<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class newsModel extends Model
{
    //

    protected $table = "news";

    public function newsFiles()
    {
    	return $this->hasMany('App\Models\newsFilesModel', 'news_id');
    }
}
