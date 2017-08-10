<?php

namespace App;

use App\CustomClasses\Unite;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use Unite;

    protected $primaryKey = ['product_id', 'size_id', 'color_id'];
    protected $table = 'stock';
    protected $fillable = ['product_id', 'size_id', 'amount'];
    public $incrementing = false;
    public $timestamps = false;

    protected function setKeysForSaveQuery(\Illuminate\Database\Eloquent\Builder $query) {
        if (is_array($this->primaryKey)) {
            foreach ($this->primaryKey as $pk) {
                $query->where($pk, '=', $this->original[$pk]);
            }
            return $query;
        }else{
            return parent::setKeysForSaveQuery($query);
        }
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Color');
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }
}
