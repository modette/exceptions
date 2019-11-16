# Modette Exceptions

Base exceptions designed for static analysis and easy usage

## Content

- [CheckedException](#checkedexception)
- [UncheckedException](#uncheckedexception)
- [ConfigurationHelper](#configuration-helper)
- [PHPStan integration](#phpstan-integration)

## CheckedException

Exceptions which are used to represent a single domain-specific error caused by user interaction.
Checked exceptions are intended to be handled. They should always be catched or listed in annotations and catched in higher layers.
All of them implement interface `CheckedException`.

```php
use Modette\Exceptions\DomainException;

final class AccountBalanceTooLowException extends DomainException
{

	/** @var Account */
	private $account;

	/** @var Money */
	private $neededAmount;

	public function __construct(Account $account, Money $neededAmount) {
		parent::__construct();
	    $this->account = $account;
	    $this->neededAmount = $neededAmount;
	}

	public function getAccount(): Account {
        return $this->account;
    }

    public function getNeededAmount(): Money {
        return $this->neededAmount;
    }

}
```

If you want add message, code or previous exception to error you can use [configuration helper](#configuration-helper).

## UncheckedException

Generic exceptions used for errors in code which should likely be fixed. They should have at least error message.
All of them implement interface `UncheckedException`.

We currently provide following unchecked exceptions:

- `DeprecatedException` - method is no longer supported, implementation was removed
- `InvalidArgumentException` - argument does not match with expected value
- `InvalidStateException` - method call is invalid for the object's current state
- `NotImplementedException` - method is not implemented
- `ShouldNotHappenException` - for cases which should never happen but it's safer or easier to read with that "dead" branch of code
- `LogicalException` - generic, base exception, must be extended

## Configuration helper

All of our exceptions use `ConfigurationHelper` which allows to add message, code and previous exception through fluent interface.

```php
use Modette\Exceptions\Logic\InvalidArgumentException;

throw (new InvalidArgumentException())
    ->withMessage('Argument is out of range')
    ->withPrevious($previousException)
    ->withCode(666);
```

## PHPStan integration

We use [phpstan-exception-rules](https://github.com/pepakriz/phpstan-exception-rules) to check all checked exceptions are properly handled.

Install package and add following configuration:

```yaml
parameters:
    exceptionRules:
        reportUnusedCatchesOfUncheckedExceptions: true
        checkedExceptions:
            - Modette\Exceptions\Check\CheckedException
```
