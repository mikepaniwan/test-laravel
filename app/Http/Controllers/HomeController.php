<?php namespace App\Http\Controllers;

use App\Inventory as Inventory;
use App\Order as Order;
use Auth;

class HomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inventories = Inventory::all();
		return view('home')->with('inventories',$inventories);
	}

	public function addOrder($id) {
		if(Auth::check()) {
			$order = new Order;
			$order->user_id = Auth::User()->id;
			$order->inventory_id = $id;

			$order->save();

			return redirect()->back()->with('message','Add Order Complete!');
		}
	}

	public function showOrder() {
		$orders = Order::where('user_id','=',Auth::user()->id)->get();
		return view('order')->with('orders',$orders);
	}

}
