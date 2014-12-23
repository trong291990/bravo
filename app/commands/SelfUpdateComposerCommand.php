<?php
namespace Deploy;
use Illuminate\Console\Command;
class SelfUpdateComposerCommand extends Command {
    protected $name = 'deploy:composer-self-update';

    protected $description = 'Command description.';
    public function fire() {
        $this->info(str_repeat('=', 80) . "\n");
        \SSH::run([
          'cd ~/public_html/dev',
          'php composer.phar self-update'
        ]);
        $this->info(str_repeat('=', 80) . "\n");
    }
}

