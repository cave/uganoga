<?php

namespace Uganoga\Commands;

use Illuminate\Console\Command;
use Uganoga\Obfuscator;

class ObfuscateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uganoga:obfuscate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Obfuscate JavaScript files as per the configuration.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $config = config('uganoga');
        $inputPaths = $config['input_paths'];
        $outputPath = $config['output_path'];

        Obfuscator::obfuscate($inputPaths, $outputPath);

        $this->info("Obfuscation completed! Uganoga files saved in {$outputPath}");
    }
}
