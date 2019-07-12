<?php declare(strict_types = 1);

namespace Modette\Exceptions\Helper;

use Exception;
use Throwable;

/**
 * @mixin Exception
 */
trait ConfigurationHelper
{

	/** @var Throwable|null */
	protected $previous;

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
		$this->previous = $throwable;

		return $this;
	}

}
