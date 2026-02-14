<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatDuration(Carbon $start, Carbon $end = null)
    {
        $end = $end ?? now();
        $diff = $start->diff($end);

        $parts = [];

        if ($diff->y > 0) {
            $parts[] = $diff->y . ' an' . ($diff->y > 1 ? 's' : '');
        }

        if ($diff->m > 0) {
            $parts[] = $diff->m . ' mois';
        }

        if (empty($parts) && $diff->d > 0) {
            $parts[] = $diff->d . ' jour' . ($diff->d > 1 ? 's' : '');
        }

        return implode(' et ', $parts) ?: '0 jour';
    }
}
