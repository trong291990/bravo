<?php

namespace Deploy;
class DumpAutoloadComposerCommand extends \Illuminate\Console\Command {
    protected $name = 'deploy:composer-dump-autoload';

    protected $description = 'Command description.';
    public function fire() {
        $this->info(str_repeat('=', 80) . "\n");
        \SSH::run([
          'cd ~/public_html/dev',
          'php composer.phar dump-update'
        ]);
        $this->info(str_repeat('=', 80) . "\n");
    }
}
