<?php

namespace Store\Toys;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Message;
//use Phalcon\Mvc\Model\Validator\Uniqueness;
//use Phalcon\Mvc\Model\Validator\InclusionIn;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Validation\Validator\InclusionIn as InclusionInValidator;
use Phalcon\Validation\Validator\Date as DateValidator;

class Robots extends Model
{
    public function validation()
    {
	$validator = new Validation();

        // Type must be: droid, mechanical or virtual
	$validator->add(
		'type',
		new InclusionInValidator(
			[
				'message'	=> 'Type must be droid, mechanical or virtual',
				'domain'	=> ['droid', 'mechanical', 'virtual'],
			]
		)
	);

        // Robot name must be unique
	$validator->add(
		'name',
		new UniquenessValidator(
			[
				'model'		=> $this,
				'message'	=> 'Name must be unique'
			]
		)
	);

        // Year cannot be less than zero
        $validator->add(
		'year',
		new DateValidator(
			[
				'format'	=> 'Y-m-d',
				'message'	=> 'Date must be Y-m-d',
			]
		)
	);

	return $this->validate($validator);
    }
}
