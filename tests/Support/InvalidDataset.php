<?php

declare(strict_types=1);

namespace Tests\Support;

use Illuminate\Support\Str;

final class InvalidDataset
{
    private array $rules = [];

    public function __construct(private ?string $field = null) {}

    public function build(): array
    {
        return $this->rules;
    }

    public function tooShort(int $min = 5): self
    {
        $this->rules[$this->field.' is short'] = [
            [$this->field => str_repeat('a', $min - 1)],
            [$this->field],
        ];

        return $this;
    }

    public function tooLong(int $max = 255): self
    {
        $this->rules[$this->field.' is long'] = [
            [$this->field => str_repeat('a', $max + 1)],
            [$this->field],
        ];

        return $this;
    }

    public function required(): self
    {
        $this->rules[$this->field.' is null'] = [
            [$this->field => null],
            [$this->field],
        ];

        return $this;
    }

    public function future(): self
    {
        $this->rules[$this->field.' is in the past'] = [
            [$this->field => now()->addDay()->toDateString()],
            [$this->field],
        ];

        return $this;
    }

    public function past(): self
    {
        $this->rules[$this->field.' is in the future'] = [
            [$this->field => now()->subDay()->toDateString()],
            [$this->field],
        ];

        return $this;
    }

    public function foreignKey(string $model): self
    {
        $field = Str::snake(class_basename($model)).'_id';
        $this->field = $field;

        $this->rules[$field.' is string'] = [
            [$field => 'not an integer'],
            [$field],
        ];

        $this->rules[$field.' is invalid'] = [
            [$field => 999999],
            [$field],
        ];

        return $this;
    }

    public function invalidDateOrder(string $startField, string $endField): self
    {
        $this->rules[sprintf('%s is before %s', $endField, $startField)] = [
            [
                $startField => now()->toDateString(),
                $endField => now()->subDay()->toDateString(),
            ],
            [$endField],
        ];

        return $this;
    }

    public function invalidName(
        string $field = 'name',
        int $min = 2,
        int $max = 30
    ): self {
        $this->addRule(
            $field.'.ar is null',
            [$field => ['ar' => null, 'en' => 'name in english']],
            $field.'.ar'
        );

        $this->addRule(
            $field.'.ar is short',
            [$field => ['ar' => str_repeat('a', $min - 1), 'en' => 'name in english']],
            $field.'.ar'
        );

        $this->addRule(
            $field.'.ar is long',
            [$field => ['ar' => str_repeat('a', $max + 1), 'en' => 'name in english']],
            $field.'.ar'
        );

        $this->addRule(
            $field.'.en is null',
            [$field => ['en' => null, 'ar' => 'name in arabic']],
            $field.'.en'
        );

        $this->addRule(
            $field.'.en is short',
            [$field => ['en' => str_repeat('a', $min - 1), 'ar' => 'name in arabic']],
            $field.'.en'
        );

        $this->addRule(
            $field.'.en is long',
            [$field => ['en' => str_repeat('a', $max + 1), 'ar' => 'name in arabic']],
            $field.'.en'
        );

        return $this;
    }

    public function regex(string $invalidValue = 'invalid-format'): self
    {
        $this->rules[$this->field.' has invalid format'] = [
            [$this->field => $invalidValue],
            [$this->field],
        ];

        return $this;
    }

    public function digits(int $length): self
    {
        $max = $length + 1;
        $min = $length - 1;

        $this->rules[sprintf('%s must be less than %d digits', $this->field, $max)] = [
            [$this->field => str_repeat('1', $max)],
            [$this->field],
        ];

        $this->rules[sprintf('%s must be greater than %d digits', $this->field, $min)] = [
            [$this->field => str_repeat('1', $min)],
            [$this->field],
        ];

        $this->rules[$this->field.' must be digits'] = [
            [$this->field => str_repeat('a', $length)],
            [$this->field],
        ];

        return $this;
    }

    private function addRule(string $label, array $payload, string $invalidField): void
    {
        $this->rules[$label] = [
            $payload,
            [$invalidField],
        ];
    }
}
