<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class in its own folder';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}");

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $serviceFile = "{$path}/{$name}Service.php";

        if (!file_exists($serviceFile)) {
            file_put_contents($serviceFile, "<?php\n\nnamespace App\Services\\{$name};\n\nclass {$name}Service\n{\n    // Service methods go here\n}\n");
            $this->info("Service created successfully: {$serviceFile}");
        } else {
            $this->error("Service already exists: {$serviceFile}");
        }
    }
}

