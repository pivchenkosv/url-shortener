<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['original_url'];

    public $timestamps = false;

    public function scopeByCode($query, $code)
    {
        return $query->where('code', 'like', '%' . $code . '%');
    }
}
