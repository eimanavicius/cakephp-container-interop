# Container Interop in CakePHP

Container Interoperability plugin for CakePHP 2.x. This plugin adds the ability to easy configure any service containers compatible with [container-interop](https://github.com/container-interop/container-interop).

It provides the clean component to access you container or services in container. Also you get container registered in ClassRegistry that allows you to gradually migrate your application.

## Installation

Installation through composer is HIGHLY RECOMMENDED. Installation can be done manually, but requires a lot more steps and is not supported officially.

### composer

```
composer require eimanavicius/cakephp-container-interop
```

or add requirement to your `composer.json` file manually and don't forget to run `composer update`

```
"require": {
    "eimanavicius/cakephp-container-interop": "^0.0"
}
```

## Configuration

By default container is loaded from file `app/Config/container.php` (file should return configured service container instance). You can change that by specifying config value before plugin load:

```
Configure::write('Interop\Container\ContainerInterface', 'app/Config/your-container-setup.php');
```

Load the plugin as any other plugin in `app/Config/bootstrap.php`:

```
CakePlugin::load('ContainerInterop', array('bootstrap' => true));
```

The bootstrap file must be loaded, to set up all configurations needed.
