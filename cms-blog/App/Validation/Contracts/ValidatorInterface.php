<?php 

namespace App\Validation\Contracts;

interface ValidatorInterface
{
	public function make( $request, $rules);
	public function fails();
}