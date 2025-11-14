<?php

declare(strict_types=1);

namespace Mammatus\Tests\Cron\Attributes;

use Mammatus\Cron\Attributes\Cron;
use Mammatus\Cron\Attributes\Crons;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class CronsTest extends TestCase
{
    #[Test]
    public function sharedAddOns(): void
    {
        $addonA = new StubAddOn();
        $addonB = new StubAddOn();
        $addonC = new StubAddOn();

        $crons = new Crons(
            new Cron(
                'A',
                13.37,
                '* * * * *',
                $addonA,
            ),
            new Cron(
                'B',
                6.9,
                '* * * * *',
                $addonB,
            ),
            $addonC,
        );

        self::assertSame('A', $crons->crons[0]->name);
        self::assertSame(13.37, $crons->crons[0]->ttl);
        self::assertSame('* * * * *', $crons->crons[0]->schedule);
        self::assertSame([$addonA, $addonC], $crons->crons[0]->addOns);
        self::assertSame('B', $crons->crons[1]->name);
        self::assertSame(6.9, $crons->crons[1]->ttl);
        self::assertSame('* * * * *', $crons->crons[1]->schedule);
        self::assertSame([$addonB, $addonC], $crons->crons[1]->addOns);
    }
}
