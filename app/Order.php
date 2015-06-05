<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = 'orders';


	public function getInventory() {
		return $this->belongsTo('App\Inventory','inventory_id');
	}

	public function getUser() {
		return $this->belongsTo('App\User','user_id');
	}

}
