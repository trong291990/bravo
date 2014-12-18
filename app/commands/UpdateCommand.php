<?php namespace Deploy;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpdateCommand extends Command {

	protected $name = 'deploy:update-source';

	protected $description = 'Update source code to server';

	public function __construct() {
		parent::__construct();
	}

	public function fire() {
		$this->info(str_repeat('=', 80) . "\n");
    \SSH::run([
      'cd ~/public_html/dev',
      'git pull origin master'
    ]);
    $this->info(str_repeat('=', 80) . "\n");
	}

}
