<?php

namespace App\Observers;

use App\Core\Storeagable;
use App\Models\{Formula, Rate, Unit};

class UnitObserver
{
    use Storeagable;

    /**
     * @var string
     */
    const DIRECTORY = 'units';

    /**
     * Handle the unit "creating" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function creating(Unit $unit)
    {
        if ($this->hasImage()) $unit->image = $this->getHashImageName();

        $unit->lowest = $this->isLowest();
        $unit->etc = $this->isEtc();
    }

    /**
     * Handle the unit "created" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function created(Unit $unit)
    {
        if ($this->isLowest()) $unit->formulas()->create(['unit_id' => Unit::wisp()->value('id')]);

        Rate::flush();
    }

    /**
     * Handle the unit "updating" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function updating(Unit $unit)
    {
        if ($this->hasImage()) $unit->image = $this->getHashImageName();
    }

    /**
     * Handle the unit "deleted" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function deleted(Unit $unit)
    {
        $unit->formulas->each->delete();

        Formula::where('unit_id', $unit->id)->get()->each->delete();
    }

    /**
     * @return bool
     */
    protected function isLowest() : bool
    {
        return request()->input('rate_id') && request()->input('rate_id') == Rate::lowest()->value('id');
    }

    /**
     * @return bool
     */
    protected function isEtc() : bool
    {
        return request()->input('rate_id') && request()->input('rate_id') == Rate::etc()->value('id');
    }
}
