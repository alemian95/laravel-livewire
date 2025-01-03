<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasHumanTimestamps
{
    public function humanCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->humanTimestamp($this->created_at)
        );
    }

    public function humanUpdatedAt(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->humanTimestamp($this->updated_at)
        );
    }

    private function humanTimestamp(string $timestamp): string
    {
        Carbon::setLocale(app()->getLocale());
        $d = Carbon::parse($timestamp);

        return ucwords($d->isoFormat("dddd, MMMM D, YYYY hh:mm A"));
    }
}
