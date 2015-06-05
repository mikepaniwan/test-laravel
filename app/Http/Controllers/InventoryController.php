<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use App\Inventory as Inventory;

class InventoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Request::has('search'))
			$inventories = Inventory::where('name','=',Request::input('search'))->paginate(5);
		else
			$inventories = Inventory::paginate(5);


		return view('inventory.index')->with('inventories',$inventories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('inventory.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();

		if($data['old_id'] == "")
			$inventory = new Inventory;
		else
			$inventory = Inventory::find($data['old_id']);

		$inventory->name = $data['name'];
		$inventory->value = $data['value'];
		$inventory->save();

		$message = "";

		if($data['old_id'] != "")
			$message = "Edit Inventory id = " . $inventory->id . ", name = " . $inventory->name . ", value = " . $inventory->value;
		else
			$message = "Create Inventory";

		return redirect(route('inventory.index'))->with('message',$message); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	// inventory/{id}

	public function show($id)
	{
		$inventory = Inventory::find($id);
		return view('inventory.show')->with('inventory',$inventory);
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$inventory = Inventory::find($id);
		return view('inventory.create')->with('inventory',$inventory);
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$inventory = Inventory::find($id);
		$inventory->delete();

		return redirect()->back()->with('message','Delete Inventory id = ' . $id);
		//
	}

}
