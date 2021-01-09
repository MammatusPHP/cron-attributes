<?php declare(strict_types=1);

namespace Mammatus\Cron\Attributes;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
final class Cron
{
    private string $name;
    private float $ttl;
    private string $schedule;

    public function __construct(string $name, float $ttl, string $schedule)
    {
        $this->name = $name;
        $this->ttl = $ttl;
        $this->schedule = $schedule;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function ttl(): float
    {
        return $this->ttl;
    }

    /**
     * @return iterable<string>
     */
    public function schedules(): iterable
    {
        yield from $this->schedules;
    }
}
