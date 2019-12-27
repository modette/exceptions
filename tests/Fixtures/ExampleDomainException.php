<?php declare(strict_types = 1);

namespace Tests\Modette\Exceptions\Fixtures;

use Modette\Exceptions\DomainException;

final class ExampleDomainException extends DomainException
{

	public function __construct()
	{
		parent::__construct();
	}

}
