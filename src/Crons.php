<?php

declare(strict_types=1);

namespace Mammatus\Cron\Attributes;

use Attribute;
use Mammatus\Kubernetes\Contracts\AddOn;

use function array_filter;
use function array_map;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final readonly class Crons
{
    /** @var array<Cron> */
    public array $crons;

    public function __construct(
        Cron|AddOn ...$objects,
    ) {
        $addons      = array_filter($objects, static fn (Cron|AddOn $object): bool => $object instanceof AddOn);
        $this->crons = array_map(static fn (Cron $cron): Cron => new Cron(
            $cron->name,
            $cron->ttl,
            $cron->schedule,
            ...$cron->addOns,
            ...$addons,
        ), array_filter($objects, static fn (Cron|AddOn $object): bool => $object instanceof Cron));
    }
}
