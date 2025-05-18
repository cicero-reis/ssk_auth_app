<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__.'/app')
    ->name('*.php')
    ->notName('*.blade.php')
    ->exclude(['storage', 'vendor']);

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR12' => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
        ],
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder);
