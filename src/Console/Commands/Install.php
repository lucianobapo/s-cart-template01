<?php

namespace ErpNET\SCartTemplate\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Install extends Command
{
    protected $progressBar;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'erpnet:s-cart-template:install
                                {--timeout=300} : How many seconds to allow each process to run.
                                {--debug} : Show process output or not. Useful for debugging.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $provider = 'ErpNET\SCartTemplate\Providers\TServiceProvider';
    protected $title = 'ErpNET\SCartTemplate';
    protected $description = 'ErpNET\SCartTemplate install and execute';

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
        //
        //$this->info(" Backpack\Base installation started. Please wait...");
        $this->progressBar = $this->output->createProgressBar(2);
        $this->progressBar->start();
        $this->info($this->title." installation started. Please wait...");
        $this->progressBar->advance();

        $this->line(' Publishing files');
        $this->executeProcess([
            'php',
            'artisan',
            'vendor:publish',
            '--force',
            '--provider="'.$this->provider.'"',
            ]);

        //$this->line(' Configuring files');
        //$this->executeProcess('chmod +x permissions.sh');

        //$this->line(' Start files');
        //$this->executeProcess('./permissions.sh');

        $this->progressBar->finish();
        $this->info($this->title." installation finished.");
    }

    /**
     * Run a SSH command.
     *
     * @param string $command      The SSH command that needs to be run
     * @param bool   $beforeNotice Information for the user before the command is run
     * @param bool   $afterNotice  Information for the user after the command is run
     *
     * @return mixed Command-line output
     */
    public function executeProcess($command, $beforeNotice = false, $afterNotice = false):void
    {
        $this->echo('info', $beforeNotice ? ' '.$beforeNotice : $command);

        $process = new Process($command, null, null, null, $this->option('timeout'), null);
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                $this->echo('comment', $buffer);
            } else {
                $this->echo('line', $buffer);
            }
        });

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if ($this->progressBar) {
            $this->progressBar->advance();
        }

        if ($afterNotice) {
            $this->echo('info', $afterNotice);
        }
    }

    /**
     * Write text to the screen for the user to see.
     *
     * @param [string] $type    line, info, comment, question, error
     * @param [string] $content
     */
    public function echo($type, $content)
    {
        if ($this->option('debug') == false) {
            return;
        }

        // skip empty lines
        if (trim($content)) {
            $this->{$type}($content);
        }
    }
}
