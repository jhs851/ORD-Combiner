<?php

namespace App\Console\Commands;

use App\Core\VersionScope;
use App\Models\Avatar;
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
        $images = Unit::withoutGlobalScope(VersionScope::class)->pluck('image')->toArray() + ['units/default.jpg'];
        $this->clear($images, 'units');

        $images = Avatar::pluck('image')->toArray();
        $this->clear($images, 'avatars');

        $this->info('I\'ve cleaned all orphaned files.');
    }

    /**
     * @param        $file
     * @param array  $images
     * @param string $directory
     * @return bool
     */
    protected function notNecessary($file, array $images, string $directory) : bool
    {
        return ! in_array(str_replace($directory . '/', '', $file), $images);
    }

    /**
     * @param array  $images
     * @param string $directory
     */
    protected function clear(array $images, string $directory) : void
    {
        foreach (Storage::files($directory) as $file) if ($this->notNecessary($file, $images, $directory))
            Storage::delete($file);
    }
}
