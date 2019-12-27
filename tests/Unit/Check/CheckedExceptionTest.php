<?php declare(strict_types = 1);

namespace Tests\Modette\Exceptions\Unit\Check;

use PHPUnit\Framework\TestCase;
use Tests\Modette\Exceptions\Fixtures\ExampleDomainException;

final class CheckedExceptionTest extends TestCase
{

	/**
	 * @throws ExampleDomainException
	 */
	public function testAnnotated(): void
	{
		$this->expectException(ExampleDomainException::class);
		$this->expectExceptionCode(0);
		$this->expectExceptionMessage('');

		throw new ExampleDomainException();
	}

	public function testNotAnnotated(): void
	{
		$this->expectException(ExampleDomainException::class);
		$this->expectExceptionCode(0);
		$this->expectExceptionMessage('');

		throw new ExampleDomainException();
	}

}
