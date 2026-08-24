<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Archive extends Composer
{
    protected static $views = [
        'archive',
        'archive-*',
    ];

    public function with(): array
    {
        return [];
    }
}
