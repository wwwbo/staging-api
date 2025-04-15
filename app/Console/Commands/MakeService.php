<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeService extends Command
{
    protected $signature = 'make:service {name}';
    protected $description = 'Create a new service class';

    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");
        $lastPath = $this->lastPathValue($name);

        if (File::exists($path)) {
            $this->error('Service already exists!');
            return;
        }

        $namespace = "App\\Services\\{$lastPath}";
        $className = class_basename($name);
        $dir = dirname($path);

        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        File::put($path, "<?php

namespace {$namespace};

class {$className}
{
    //
}
");

        $this->info("Service {$className} created successfully.");
    }


    private function lastPathValue($path) {
        $sanitizePath = Str::beforeLast($path, '/');

        return str_replace('/', '\\', $sanitizePath);
    }
}
