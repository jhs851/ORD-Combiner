<?php

namespace App\Console\Commands;

use App\Core\VersionScope;
use App\Models\Unit;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearOrphanged extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orphaned:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'I\'ve cleaned all orphaned files.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $images = Unit::withoutGlobalScope(VersionScope::class)->pluck('image')->toArray() + ['default.jpg'];
        $files = Storage::files('units');

        foreach ($files as $file)
            if (array_search(str_replace('units/', '', $file), $images) === false)
                Storage::delete($file);

        $this->info('I\'ve cleaned all orphaned files.');
    }
}
