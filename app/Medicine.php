<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $guarded = array('id');

    public static function scopeFindName($query, $keyword)
    {
            if($keyword != ''){
                return $query->where('name', 'like', '%'.$keyword.'%')->where('status', 1)->latest('created_at');

            }else{

                return $query->where('status', 1)->latest('created_at');
            }
            
    }
}
