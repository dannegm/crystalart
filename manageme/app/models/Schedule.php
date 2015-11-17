<?php

class Schedule extends Eloquent {

	protected $table = 'schedules';

	public function author () {
		return $this->hasOne('User', 'uid', 'author_uid');
	}

	public function cover () {
		return $this->hasOne('Picture', 'uid', 'cover_uid');
	}

	public function humanDate () {
		$dt = Carbon::parse($this->date);
		return $dt->formatLocalized('%B %e, %Y');
	}

	public function formDate () {
		$dt = Carbon::parse($this->date);
		return $dt->formatLocalized('%m/%d/%Y %l:%M %p');
	}

}
