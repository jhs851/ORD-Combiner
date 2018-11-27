<?php

namespace App\Observers;

use App\Models\{Formula, Rate};

class FormulaObserver
{
    /**
     * Handle the formula "created" event.
     *
     * @param  Formula $formula
     * @return void
     */
    public function created(Formula $formula)
    {
        $formula->upper()->create([
            'target_id' => $formula->unit_id,
            'unit_id'   => $formula->target_id,
        ]);

        Rate::flush();
    }

    /**
     * Handle the formula "updated" event.
     *
     * @param  Formula $formula
     * @return void
     */
    public function updated(Formula $formula)
    {
        $formula->upper()->update(['target_id' => $formula->unit_id]);

        Rate::flush();
    }

    /**
     * Handle the formula "deleted" event.
     *
     * @param  Formula $formula
     * @return void
     */
    public function deleted(Formula $formula)
    {
        $formula->upper->delete();

        Rate::flush();
    }
}
