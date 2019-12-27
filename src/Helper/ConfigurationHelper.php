<?php declare(strict_types = 1);

namespace Modette\Exceptions\Helper;

use Exception;
use ReflectionClass;
use Throwable;

/**
 * @mixin Exception
 */
trait ConfigurationHelper
{

	/**
	 * @return static
	 */
	public function withCode(int $code)
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * @return static
	 */
	public function withMessage(string $message)
	{
		$this->message = $message;

		return $this;
	}

	/**
	 * @return static
	 */
	public function withPrevious(Throwable $throwable)
	{
		$reflection = new ReflectionClass(Exception::class);
		$property = $reflection->getProperty('previous');
		$property->setAccessible(true);
		$property->setValue($this, $throwable);
		$property->setAccessible(false);

		return $this;
	}

}
