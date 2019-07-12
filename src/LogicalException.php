<?php declare(strict_types = 1);

namespace Modette\Exceptions;

use LogicException;
use Modette\Exceptions\Check\UncheckedException;
use Modette\Exceptions\Helper\ConfigurationHelper;

abstract class LogicalException extends LogicException implements UncheckedException
{

	use ConfigurationHelper;

}
