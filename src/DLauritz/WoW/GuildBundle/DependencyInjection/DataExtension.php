<?php
namespace DLauritz\WoW\GuildBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class DataExtension extends Extension {
	
  public function load(array $config, ContainerBuilder $container) {
    $definition = new Definition('DLauritz\WoW\GuildBundle\Extension\DataExtension');
    
    // Inform the system that this extension exists
    $definition->addTag('twig.extension');
    $container->setDefinition('wowdata_extension', $definition);
  }
}