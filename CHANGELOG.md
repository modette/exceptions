# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.1] - 2019-12-27

### Fixed

- `ConfigurationHelper::withPrevious()` - properly sets previous exception

## [1.0.0] - 2019-11-16

### Added

- `CheckedException` interface
  - `DomainException`
- `UncheckedException` interface
  - `InvalidArgumentException`
  - `InvalidStateException`
  - `NotImplementedException`
  - `ShouldNotHappenException`
  - `LogicalException`

[Unreleased]: https://github.com/modette/exceptions/compare/v1.0.1...HEAD
[1.0.1]: https://github.com/modette/exceptions/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/modette/exceptions/releases/tag/v1.0.0
