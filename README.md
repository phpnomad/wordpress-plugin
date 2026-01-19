# PHPNomad WordPress Plugin

A comprehensive bundle of PHPNomad packages providing modular PHP components for WordPress including core utilities, database abstraction, REST API, templating, events, and more.

## What It Does

This plugin serves as a centralized bundle that loads all PHPNomad framework packages into WordPress. It provides a complete set of modern PHP development tools and abstractions specifically designed for WordPress plugin and theme development.

## Requirements

- PHP 8.2 or higher
- WordPress 6.5 or higher (for Plugin Dependencies feature)

## Dependencies

### Core Foundation
- **[phpnomad/core](https://github.com/phpnomad/core)** - Core interfaces and base functionality for the PHPNomad framework
- **[phpnomad/framework](https://github.com/phpnomad/framework)** - Main framework orchestration and bootstrapping
- **[phpnomad/utils](https://github.com/phpnomad/utils)** - Common utility functions and helpers (includes `Arr` and `Str` helpers)

### Configuration & Loading
- **[phpnomad/config](https://github.com/phpnomad/config)** - Configuration management system
- **[phpnomad/array-json-config](https://github.com/phpnomad/array-json-config)** - Array and JSON-based configuration providers
- **[phpnomad/json-config-integration](https://github.com/phpnomad/json-config-integration)** - Integration layer for JSON configuration
- **[phpnomad/loader](https://github.com/phpnomad/loader)** - Class and file loading utilities

### Dependency Injection & Design Patterns
- **[phpnomad/di](https://github.com/phpnomad/di)** - Dependency injection container
- **[phpnomad/singleton](https://github.com/phpnomad/singleton)** - Singleton pattern implementation
- **[phpnomad/decorator](https://github.com/phpnomad/decorator)** - Decorator pattern utilities
- **[phpnomad/facade](https://github.com/phpnomad/facade)** - Facade pattern implementation
- **[phpnomad/registry](https://github.com/phpnomad/registry)** - Registry pattern for managing objects

### Database & Data Management
- **[phpnomad/db](https://github.com/phpnomad/db)** - Database abstraction layer
- **[phpnomad/datastore](https://github.com/phpnomad/datastore)** - Generic data storage interfaces
- **[phpnomad/mysql-integration](https://github.com/phpnomad/mysql-integration)** - MySQL-specific database integration

### HTTP & REST API
- **[phpnomad/http](https://github.com/phpnomad/http)** - HTTP request/response handling
- **[phpnomad/rest](https://github.com/phpnomad/rest)** - REST API framework
- **[phpnomad/fastroute-rest-integration](https://github.com/phpnomad/fastroute-rest-integration)** - FastRoute integration for REST routing
- **[phpnomad/fetch](https://github.com/phpnomad/fetch)** - HTTP client abstraction
- **[phpnomad/guzzle-fetch](https://github.com/phpnomad/guzzle-fetch)** - Guzzle HTTP client integration

### Authentication & Security
- **[phpnomad/auth](https://github.com/phpnomad/auth)** - Authentication and authorization framework
- **[phpnomad/firebase-jwt-integration](https://github.com/phpnomad/firebase-jwt-integration)** - JWT token handling via Firebase JWT
- **[phpnomad/privacy](https://github.com/phpnomad/privacy)** - Privacy and data protection utilities

### Templating & Content
- **[phpnomad/template](https://github.com/phpnomad/template)** - Template rendering system
- **[phpnomad/twig-integration](https://github.com/phpnomad/twig-integration)** - Twig templating engine integration
- **[phpnomad/markdown](https://github.com/phpnomad/markdown)** - Markdown processing
- **[phpnomad/league-markdown-integration](https://github.com/phpnomad/league-markdown-integration)** - League CommonMark integration

### Events & Background Tasks
- **[phpnomad/event](https://github.com/phpnomad/event)** - Event system and dispatcher
- **[phpnomad/symfony-event-dispatcher-integration](https://github.com/phpnomad/symfony-event-dispatcher-integration)** - Symfony EventDispatcher integration
- **[phpnomad/tasks](https://github.com/phpnomad/tasks)** - Background task scheduling and execution

### Caching & Performance
- **[phpnomad/cache](https://github.com/phpnomad/cache)** - Caching abstraction layer
- **[phpnomad/symfony-cache-integration](https://github.com/phpnomad/symfony-cache-integration)** - Symfony Cache component integration

### CLI & Console
- **[phpnomad/console](https://github.com/phpnomad/console)** - Console command framework
- **[phpnomad/symfony-console-integration](https://github.com/phpnomad/symfony-console-integration)** - Symfony Console integration

### Email & Communication
- **[phpnomad/email](https://github.com/phpnomad/email)** - Email sending abstraction
- **[phpnomad/php-mail-integration](https://github.com/phpnomad/php-mail-integration)** - PHP mail function integration

### Internationalization & Localization
- **[phpnomad/translate](https://github.com/phpnomad/translate)** - Translation and localization system

### Asset Management
- **[phpnomad/asset](https://github.com/phpnomad/asset)** - CSS/JS asset management and enqueueing

### Utilities & Helpers
- **[phpnomad/mutator](https://github.com/phpnomad/mutator)** - Data mutation and transformation utilities
- **[phpnomad/logger](https://github.com/phpnomad/logger)** - Logging interfaces and utilities
- **[phpnomad/update](https://github.com/phpnomad/update)** - Plugin/theme update management
- **[phpnomad/enum-polyfill](https://github.com/phpnomad/enum-polyfill)** - PHP enum polyfill for older versions

### WordPress Integration
- **[phpnomad/wordpress-integration](https://github.com/phpnomad/wordpress-integration)** - WordPress-specific integrations and adapters

## Using PHPNomad as a Dependency

If you're developing a plugin that depends on PHPNomad, you can use WordPress's built-in Plugin Dependencies feature (introduced in WordPress 6.5) to ensure PHPNomad is installed and activated before your plugin.

### Declaring the Dependency

Add the `Requires Plugins` header to your plugin's main PHP file:

```php
/**
 * Plugin Name: My Plugin
 * Requires Plugins: phpnomad
 */
```

### Using the `phpnomad_ready` Action

To ensure PHPNomad is fully loaded before your plugin initializes, hook into the `phpnomad_ready` action:

```php
add_action('phpnomad_ready', function() {
    // PHPNomad is now loaded and ready to use
    // Initialize your plugin here
});
```

This action fires immediately after PHPNomad's Composer autoloader is loaded, ensuring all PHPNomad classes and interfaces are available.

### How It Works

- WordPress will automatically prevent your plugin from being activated if PHPNomad is not installed
- Users will see a clear indication that PHPNomad must be installed first
- PHPNomad cannot be deactivated or deleted while your plugin is active
- If PHPNomad is removed via FTP or deployment, WordPress will display a notice about missing dependencies

### Important Notes

- The `Requires Plugins` header uses the plugin slug (`phpnomad`), not the file path format
- This feature does not enforce version requirements or loading order
- Continue to use `function_exists()`, `class_exists()`, `interface_exists()`, and version checks where your plugin relies on specific functionality
- For more information, see [Plugin Dependencies in WordPress 6.5](https://make.wordpress.org/core/2024/03/05/introducing-plugin-dependencies-in-wordpress-6-5/)

## License

GPLv3 or later - [http://www.gnu.org/licenses/gpl-3.0.txt](http://www.gnu.org/licenses/gpl-3.0.txt)

## Links

- [GitHub Organization](https://github.com/phpnomad)
- [Plugin Repository](https://github.com/phpnomad/wordpress)
