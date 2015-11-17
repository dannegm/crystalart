<?php

class ScheduleController extends \BaseController {

	public function index () {
		$schedules = Schedule::orderBy('date', 'desc')->paginate(12);
		$data = array(
			'title' => 'Schedule',
			'section' => 'schedules',
			'schedules' => $schedules
		);
		return View::make('appanel/schedules/index', $data);
	}

	public function create () {
		$data = array(
			'title' => 'Nuevo evento',
			'section' => 'schedules'
		);
		return View::make('appanel/schedules/create', $data);
	}

	public function view ($uid) {
		$schedule = Schedule::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Vista previa",
			'section' => 'schedules',
			'schedule' => $schedule[0]
		);
		return View::make('appanel/schedules/view', $data);
	}

	public function edit ($uid) {
		$schedule = Schedule::where('uid', '=', $uid)->take(1)->get();
		$data = array(
			'title' => "Editar evento",
			'section' => 'schedules',
			'schedule' => $schedule[0]
		);
		return View::make('appanel/schedules/edit', $data);
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
			return Redirect::route('appanel.schedules.create')
				->withErrors($validator)
				->withInput();
		} else {
			$schedule = new Schedule;
			$schedule->uid = uniqid();

			$schedule->name = Input::get('name');
			$schedule->description = Input::get('description');
			$schedule->address = Input::get('address');
			$schedule->contact = Input::get('contact');

			function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
			$schedule->permalink = hyphenize(Input::get('name'));

			$schedule->author_uid = $selfuser->uid;
			$schedule->date = new Carbon(Input::get('date'));
			$schedule->month = $schedule->date->month;

			$pic_cover = Input::get('pic_cover');
			$pic_cover = !empty($pic_cover) ? $pic_cover : 'avatar';
			$schedule->cover_uid = $pic_cover;

			$schedule->save();

			return Redirect::to(route('appanel.schedules.index'));
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

		$schedules = Schedule::where('uid', '=', $uid)->take(1)->get();
		$schedule = $schedules[0];
		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.schedules.edit', array('id' => $schedule->uid))
				->withErrors($validator)
				->withInput();
		} else {
			$schedule->name = Input::get('name');
			$schedule->description = Input::get('description');
			$schedule->address = Input::get('address');
			$schedule->contact = Input::get('contact');

			function hyphenize($string) { return strtolower( preg_replace( array('#[\\s-]+#', '#[^A-Za-z0-9\-]+#'), array('-', ''), urldecode($string) ) ); }
			$schedule->permalink = hyphenize(Input::get('name'));

			$schedule->author_uid = $selfuser->uid;
			$schedule->date = new Carbon(Input::get('date'));
			$schedule->month = $schedule->date->month;

			$pic_cover = Input::get('pic_cover');
			$pic_cover = !empty($pic_cover) ? $pic_cover : '55f632283dfe8';
			$schedule->cover_uid = $pic_cover;

			$schedule->save();

			return Redirect::to(route('appanel.schedules.edit', array('id' => $schedule->uid)));
		}
	}

	public function destroy ($uid) {
		$schedules = Schedule::where('uid', '=', $uid)->take(1)->get();
		$schedule = $schedules[0];
		$schedule->delete();
		return Redirect::to(route('appanel.schedules.index'));
	}
}