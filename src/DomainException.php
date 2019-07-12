<?php declare(strict_types = 1);

namespace Modette\Exceptions;

use Exception;
use Modette\Exceptions\Check\CheckedException;
use Modette\Exceptions\Helper\ConfigurationHelper;

abstract class DomainException extends Exception implements CheckedException
{

	use ConfigurationHelper;

}
