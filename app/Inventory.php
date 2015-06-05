<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model {

	protected $table = 'inventories';

	public function getPlaces() {
		return $this->hasMany('App\Place');
	}
}
