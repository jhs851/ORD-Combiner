<?php

namespace App\Models;

use App\Core\{Cacheable, Orderable, Orderablent};
use Illuminate\Database\Eloquent\{Builder, Model, Relations\BelongsTo, Relations\HasMany};
use Illuminate\Support\Facades\Storage;

class Unit extends Model implements Orderablent
{
    use Cacheable, Orderable;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($unit) {
            if (request()->hasFile('image') && request()->file('image')->isValid()) {
                request()->file('image')->store('units');

                $unit->image = request()->file('image')->hashName();
            }

            $unit->lowest = $unit->isLowest();
            $unit->etc = $unit->isEtc();
        });

        static::created(function($unit) {
            if ($unit->isLowest()) $unit->formulas()->create(['unit_id' => 1]);
        });

        static::updating(function($unit) {
            if (request()->hasFile('image') && request()->file('image')->isValid()) {
                Storage::delete("units/{$unit->image}");

                request()->file('image')->store('units');

                $unit->image = request()->file('image')->hashName();
            }
        });

        static::deleting(function($unit) {
            Storage::delete("units/{$unit->image}");

            $unit->formulas->each->delete();
            $unit->uppers->each->delete();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rate_id',
        'name',
        'description',
        'order',
        'etc',
        'lowest',
        'count',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'imageUrl',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'warn'   => 'boolean',
        'etc'    => 'boolean',
        'lowest' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function rate() : BelongsTo
    {
        return $this->belongsTo(Rate::class)->without('units');
    }

    /**
     * @return HasMany
     */
    public function formulas() : HasMany
    {
        return $this->hasMany(Formula::class, 'target_id')->with('unit');
    }

    /**
     * @return HasMany
     */
    public function uppers() : HasMany
    {
        return $this->hasMany(Upper::class, 'target_id');
    }

    /**
     * @return string
     */
    public function getImageUrlAttribute() : string
    {
        return Storage::url('units/' . ($this->image ?: 'default.jpg'));
    }

    /**
     * @return string
     */
    public function getCriteriaId() : string
    {
        return 'rate_id';
    }

    /**
     * @return bool
     */
    protected function isLowest() : bool
    {
        return request()->input('rate_id') == Rate::lowest()->value('id');
    }

    /**
     * @return bool
     */
    protected function isEtc() : bool
    {
        return request()->input('rate_id') == Rate::etc()->value('id');
    }

    /**
     * 해당 유닛의 조합 유닛으로 가능한 모든 유닛을 반환한다.
     * 선위 빼와 해당 유닛의 이미 존재하는 조합 유닛들도 제외시킨다.
     *
     * @param Builder $builder
     * @param int     $targetId
     * @return Builder
     */
    public function scopePossibleFormulas(Builder $builder, int $targetId) : Builder
    {
        $target = static::findOrFail($targetId);

        return $builder->where('name', '<>', '위습')
                       ->whereIn('rate_id', Rate::cache(function($rate) use ($target) { return $rate->lowerGrade($target)->pluck('id'); }))
                       ->whereNotIn('id', $target->formulas()->pluck('unit_id'))
                       ->orderBy('rate_id', 'asc')
                       ->orderBy('order', 'asc')
                       ->with('rate');
    }
}
