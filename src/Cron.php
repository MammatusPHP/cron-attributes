<?php

declare(strict_types=1);

namespace Mammatus\Cron\Attributes;

use Attribute;
use Mammatus\Kubernetes\Contracts\AddOn;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class Cron
{
    /** @var array<AddOn> */
    public array $addOns;

    public function __construct(
        public string $name,
        public float $ttl,
        public string $schedule,
        AddOn ...$addOns,
    ) {
        $this->addOns = $addOns;
    }
}
