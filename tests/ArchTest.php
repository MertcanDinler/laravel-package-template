<?php

declare(strict_types=1);

\it('will not use debugging functions')
    ->expect(['dd', 'dump'])
    ->each->not->toBeUsed();
