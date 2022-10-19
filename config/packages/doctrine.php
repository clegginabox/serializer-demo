<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder->directories()->name('Entity')->ignoreUnreadableDirs(true);
$directories = $finder->in( __DIR__ . '/../../src/Modules');

/** @var \Symfony\Component\Finder\SplFileInfo $directory */
foreach ($directories->getIterator() as $directory) {
$entityMapping[$directory->getRelativePathname()] = [
'is_bundle' => false,
'type' => 'attribute',
'dir' => '%kernel.project_dir%/src/Modules/' . $directory->getRelativePathname(),
'prefix' => 'App\\Modules\\' . str_replace('/', '\\', $directory->getRelativePath()),
'alias' => 'App\\' . $directory->getRelativePathname()
];
}
