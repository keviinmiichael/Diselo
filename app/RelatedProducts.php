<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    
    protected $primaryKey = ['product1', 'product2'];
    protected $table = 'related_products';
    public $timestamps = false;
    public $incrementing = false;

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


    public static function addRalation($origin, $destination)
    {
        $products = [$origin, $destination];
        sort($products);

        $relation = self::where('product1', $products[0])->where('product2', $products[1])->first();

        if (!$relation) $relation = new RelatedProducts;

        $relation->product1 = $products[0];
        $relation->product2 = $products[1];
        $relation->times++;
        $relation->save();
    }
}
