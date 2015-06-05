<?php namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

use App\Inventory as Inventory;
use App\Place as Place;


class PlaceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	
	public function index()
	{
		$places = Place::all();

		return view('place.index')->with('places',$places);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$inventories = Inventory::all();
		return view('place.create')->with('inventories',$inventories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Request::all();

		$place = new Place;
		$place->inventory_id = $data['inventory_id'];
		$place->province = $data['province'];
		$place->count = $data['count'];
		$place->save();

		return redirect(route('place.index'))->with('message','Create Place Complete!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
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
		//
	}

}
