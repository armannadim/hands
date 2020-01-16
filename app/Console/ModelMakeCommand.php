<?php
/**
 * Created by PhpStorm.
 * User: naseq
 * Date: 16/01/2020
 * Time: 15:12
 */

namespace App\Console\Commands;


use Illuminate\Foundation\Console\ModelMakeCommand as Command;

class ModelMakeCommand extends Command
{
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\Models";
    }

}