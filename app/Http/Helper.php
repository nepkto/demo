<?php

if(!function_exists('toast_msg')) {
	
	/**
	 * Get the message and its type.
	 *
	 * @param  string $msg
	 * @param  string $type
	 * @return array
	*/


	function toast_msg($msg, $type) {
		$notification = [
			'msg' => $msg,
			'type'=> $type
		];

		return $notification;

	}
}