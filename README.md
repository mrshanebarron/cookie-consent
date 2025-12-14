# Laravel Design Cookie Consent

GDPR cookie consent banner for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/cookie-consent
```

## Usage

### Livewire Component

```blade
<livewire:ld-cookie-consent />
```

### Blade Component

```blade
<x-ld-cookie-consent />
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-cookie-consent-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-cookie-consent-views
```

## License

MIT
