<?php declare(strict_types = 1);

namespace Tests\Modette\Exceptions\Unit\Check;

use Modette\Exceptions\Logic\DeprecatedException;
use Modette\Exceptions\Logic\InvalidArgumentException;
use Modette\Exceptions\Logic\InvalidStateException;
use Modette\Exceptions\Logic\NotImplementedException;
use Modette\Exceptions\Logic\ShouldNotHappenException;
use PHPStan\Testing\TestCase;

final class UncheckedExceptionTest extends TestCase
{

	public function testDeprecatedException(): void
	{
		$this->expectException(DeprecatedException::class);
		$this->expectExceptionCode(666);
		$this->expectDeprecationMessage('test');

		throw new DeprecatedException('test', 666);
	}

	public function testInvalidArgumentException(): void
	{
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionCode(666);
		$this->expectDeprecationMessage('test');

		throw new InvalidArgumentException('test', 666);
	}

	public function testInvalidStateException(): void
	{
		$this->expectException(InvalidStateException::class);
		$this->expectExceptionCode(666);
		$this->expectDeprecationMessage('test');

		throw new InvalidStateException('test', 666);
	}

	public function testNotImplementedException(): void
	{
		$this->expectException(NotImplementedException::class);
		$this->expectExceptionCode(666);
		$this->expectDeprecationMessage('test');

		throw new NotImplementedException('test', 666);
	}

	public function testShouldNotHappenException(): void
	{
		$this->expectException(ShouldNotHappenException::class);
		$this->expectExceptionCode(666);
		$this->expectDeprecationMessage('test');

		throw new ShouldNotHappenException('test', 666);
	}

}
