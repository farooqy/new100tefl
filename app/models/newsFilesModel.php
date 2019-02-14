<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class newsFilesModel extends Model
{
    //
    protected $table = "news_files";
    protected $fillable = [
    	'news_id', 'file_url'
    ];
    public function news()
    {
    	return $this->belongsTo('App\models\newsModel', 'id');
    }
}
