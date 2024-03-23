<?php

declare(strict_types=1);

namespace Mammatus\Cron\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class Cron
{
    public function __construct(
        public string $name,
        public float $ttl,
        public string $schedule,
    ) {
    }
}
