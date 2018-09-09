<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class TransformerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:transformer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new transformer class';

    protected $type = 'Transformer';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Transformers';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.DIRECTORY_SEPARATOR.'stubs'.DIRECTORY_SEPARATOR.'transfomer.stub';
    }
}
