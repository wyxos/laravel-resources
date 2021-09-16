<?php

namespace Wyxos\LaravelResources;

use Illuminate\Console\Command;
use function base_path;

class MakeRouteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {name} {--R|resource}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a route action.';

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
     * @return int
     */
    public function handle(): int
    {
        $name = $this->argument('name');

        $path = explode('/', $name);

        $stub = file_get_contents(__DIR__ . $this->getStub());

        $className = array_pop($path);

        $namespace = join('\\', array_merge(['App', $this->getRoot()], $path));

        $stub = str_replace('$namespace', $namespace, $stub);

        $stub = str_replace('$className', $className, $stub);

        $directory = base_path(join('/', array_merge(['app', $this->getRoot()], $path)));

        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        file_put_contents($directory . "/$className.php", $stub);

        $this->info('Done');

        return 1;
    }

    protected function getStub(): string
    {
        if ($this->isResource()) {
            return '/../stubs/resource.stub';
        }

        return '/../stubs/route.stub';
    }

    protected function getRoot(): string
    {
        if ($this->isResource()) {
            return 'Resources';
        }

        return 'Routes';
    }

    /**
     * @return array|bool|string|null
     */
    protected function isResource()
    {
        return $this->option('resource');
    }
}
