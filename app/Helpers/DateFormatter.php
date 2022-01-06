<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;

class DateFormatter
{
 public static function format($date)
  {
    return Carbon::parse($date)->format('d M Y');
  }
}