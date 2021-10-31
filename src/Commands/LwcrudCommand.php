<?php

namespace Sitesurfer\Lwcrud\Commands;

use Illuminate\Console\Command;

class LwcrudCommand extends Command
{
    public $signature = 'lwcrud';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
