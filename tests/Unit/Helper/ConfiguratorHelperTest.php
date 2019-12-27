<?php declare(strict_types = 1);

namespace Tests\Modette\Exceptions\Unit\Helper;

use Exception;
use Modette\Exceptions\Logic\ShouldNotHappenException;
use PHPUnit\Framework\TestCase;

final class ConfiguratorHelperTest extends TestCase
{

	public function test(): void
	{
		$previous = new Exception('previous');
		$exception = new ShouldNotHappenException();

		$exception->withCode(666)
			->withMessage('test')
			->withPrevious($previous);

		self::assertSame(666, $exception->getCode());
		self::assertSame('test', $exception->getMessage());
		self::assertSame($previous, $exception->getPrevious());
	}

}
