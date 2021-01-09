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

    /** @var array<string> */
    private array $schedules;

    /**
     * @param string[] $schedules
     */
    public function __construct(string $name, float $ttl, string ...$schedules)
    {
        $this->name = $name;
        $this->ttl = $ttl;
        $this->schedules = $schedules;
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
