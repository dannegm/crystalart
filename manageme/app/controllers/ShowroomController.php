<?php

class ShowroomController extends \BaseController {

	public function index () {
		$showrooms = Showroom::orderBy('date', 'desc')->paginate(12);
		$data = array(
			'title' => 'Showroom',
			'section' => 'showrooms',
			'showrooms' => $showrooms
		);
		return View::make('appanel/showrooms/index', $data);
	}

	public function create () {
		$data = array(
			'title' => 'Nuevo Showroom',
			'section' => 'showrooms'
		);
		return View::make('appanel/showrooms/create', $data);
	}

	public function view ($uid) {
		$showroom = Showroom::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Vista previa",
			'section' => 'showrooms',
			'showroom' => $showroom[0]
		);
		return View::make('appanel/showrooms/view', $data);
	}

	public function edit ($uid) {
		$showroom = Showroom::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Editar showroom",
			'section' => 'showrooms',
			'showroom' => $showroom[0]
		);
		return View::make('appanel/showrooms/edit', $data);
	}

	public function store () {
		$selfuser = Auth::user();
		$rules = array(
		);

		$messages = array (
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.showrooms.create')
				->withErrors($validator)
				->withInput();
		} else {
			$showroom = new Showroom;
			$showroom->uid = uniqid();

			$showroom->name = Input::get('name');
			$showroom->description = Input::get('description');
			$showroom->address = Input::get('address');
			$showroom->contact = Input::get('contact');

			function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
			$showroom->permalink = hyphenize(Input::get('name'));

			$showroom->author_uid = $selfuser->uid;
			$showroom->date = new Carbon(Input::get('date'));

			$pic_cover = Input::get('pic_cover');
			$pic_cover = !empty($pic_cover) ? $pic_cover : 'avatar';
			$showroom->cover_uid = $pic_cover;

			$showroom->save();

			return Redirect::to(route('appanel.showrooms.index'));
		}
	}

	public function update ($uid) {
		$selfuser = Auth::user();
		$rules = array(
		);

		$messages = array (
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		$showrooms = Showroom::where('uid', '=', $uid)->take(1)->get();
		$showroom = $showrooms[0];
		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.showrooms.edit', array('id' => $schedule->uid))
				->withErrors($validator)
				->withInput();
		} else {
			$showroom->name = Input::get('name');
			$showroom->description = Input::get('description');
			$showroom->address = Input::get('address');
			$showroom->contact = Input::get('contact');

			function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
			$showroom->permalink = hyphenize(Input::get('name'));

			$showroom->author_uid = $selfuser->uid;
			$showroom->date = new Carbon(Input::get('date'));

			$pic_cover = Input::get('pic_cover');
			$pic_cover = !empty($pic_cover) ? $pic_cover : '55f632283dfe8';
			$showroom->cover_uid = $pic_cover;

			$showroom->save();

			return Redirect::to(route('appanel.showrooms.edit', array('id' => $showroom->uid)));
		}
	}

	public function destroy ($uid) {
		$showrooms = Showroom::where('uid', '=', $uid)->take(1)->get();
		$showroom = $showrooms[0];
		$showroom->delete();
		return Redirect::to(route('appanel.showrooms.index'));
	}
}