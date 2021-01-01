<?php declare(strict_types=1);

namespace Mammatus\Cron\Attributes;

/**
 * @Annotation
 * @Target({"CLASS"})
 */
final class Cron
{
    private string $name;

    /** @var array<string> */
    private array $schedules;

    /**
     * @param string[] $schedules
     */
    public function __construct(string $name, string ...$schedules)
    {
        $this->name = $name;
        $this->schedules = $schedules;
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return iterable<string>
     */
    public function schedules(): iterable
    {
        yield from $this->schedules;
    }
}
