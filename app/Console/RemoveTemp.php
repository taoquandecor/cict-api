<?php

namespace App\Console;

use Illuminate\Console\Command;

class RemoveTemp extends Command
{
    protected $default = '';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "command:rmf {folder=temp}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove file temp.';


    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $this->default = public_path($this->argument('folder'));

        //The name of the folder.
        if (!is_dir($this->default)) {
            return;
        }

        $files = glob(sprintf('%s/%s', $this->default, '/*'));

        //Loop through the file list.
        foreach ($files as $file) {
            //Make sure that this is a file and not a directory.
            if (is_file($file)) {
                //Use the unlink function to delete the file.
                unlink($file);
            }
        }
    }
}
