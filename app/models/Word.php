<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Word extends Eloquent {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'words';	

	public function getListExcute ($id_course) {
		return Word::where('status', 1)->where('id_course', '>', $id_course)
		->where('id_course', '<', $id_course + 10)->paginate(20);
	}

	public function getListNotExcute ($id_course) {
		return Word::where('status', '<>', 1)->where('id_course', '>', $id_course)
		->where('id_course', '<', $id_course + 10)->paginate(20);
	}

	public function completeImage ($id) {
		return Word::where('id', $id)->update(array('status' => 1));
	}



}
