<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

	protected $table = 'places';

	public function getInventory() 
	{
        return $this->belongsTo('App\Inventory','inventory_id');
    }

}
