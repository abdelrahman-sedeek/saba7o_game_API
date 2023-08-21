<?php

namespace App\Console\Commands;

use App\Models\player;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportDataset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-dataset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected $statusMapping = [
        'ez' => 1,
        'mid' => 2,
        'hard' => 3,
    ];
   

    public function handle()
    {
        $directories = ['ez', 'mid', 'hard'];
        
        foreach ($directories as $directory) {
            $files = Storage::disk('public')->files($directory);
            
            foreach ($files as $file) {
                $statusId = $this->statusMapping[$directory] ;
                $filename = pathinfo($file, PATHINFO_FILENAME);

                player::create([
                    'name' => $filename,
                    'image' => '/'.$file,
                    'status' => $statusId,
                ]);
            }
        }
        $this->info('Dataset imported successfully.');
        
    }
}
