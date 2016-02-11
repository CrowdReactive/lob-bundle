<?php
$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests');

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        'concat_with_spaces',
        'short_array_syntax',
        'ordered_use',
        'phpdoc_order',
        '-phpdoc_to_comment'
    ])
    ->finder($finder);
