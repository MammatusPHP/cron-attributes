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

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->ttl = $data['ttl'];
        $this->schedule = $data['schedule'];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function ttl(): float
    {
        return $this->ttl;
    }

    public function schedule(): string
    {
        return $this->schedule;
    }
}
