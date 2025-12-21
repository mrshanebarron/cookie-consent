# Cookie Consent

A GDPR-compliant cookie consent banner for Laravel applications. Shows a dismissible notice about cookie usage. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/cookie-consent
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-cookie-consent />
```

### Custom Message

```blade
<livewire:sb-cookie-consent
    message="We use cookies to improve your experience."
    accept-text="Accept"
    decline-text="Decline"
/>
```

### With Privacy Link

```blade
<livewire:sb-cookie-consent
    message="We use cookies. See our privacy policy."
    privacy-url="/privacy"
/>
```

### Position

```blade
<livewire:sb-cookie-consent position="bottom" />
<livewire:sb-cookie-consent position="top" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `message` | string | `'This site uses cookies...'` | Banner message |
| `accept-text` | string | `'Accept'` | Accept button text |
| `decline-text` | string | `'Decline'` | Decline button text |
| `privacy-url` | string | `null` | Link to privacy policy |
| `position` | string | `'bottom'` | Position: `top` or `bottom` |

## Vue 3 Usage

### Setup

```javascript
import { SbCookieConsent } from './vendor/sb-cookie-consent';
app.component('SbCookieConsent', SbCookieConsent);
```

### Basic Usage

```vue
<template>
  <SbCookieConsent />
</template>
```

### Custom Configuration

```vue
<template>
  <SbCookieConsent
    message="We use cookies to enhance your browsing experience and analyze site traffic."
    accept-text="I Understand"
    decline-text="No Thanks"
    privacy-url="/privacy-policy"
    position="bottom"
  />
</template>
```

### With Callback

```vue
<template>
  <SbCookieConsent
    @accept="onAccept"
    @decline="onDecline"
  />
</template>

<script setup>
const onAccept = () => {
  // Enable analytics, etc.
  console.log('Cookies accepted');
};

const onDecline = () => {
  // Disable non-essential cookies
  console.log('Cookies declined');
};
</script>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `message` | String | Default message | Banner text |
| `acceptText` | String | `'Accept'` | Accept button text |
| `declineText` | String | `'Decline'` | Decline button text |
| `privacyUrl` | String | `null` | Privacy policy URL |
| `position` | String | `'bottom'` | `'top'` or `'bottom'` |

### Events

| Event | Description |
|-------|-------------|
| `accept` | User accepted cookies |
| `decline` | User declined cookies |

## Features

- **Persistent**: Remembers user choice in localStorage
- **GDPR Friendly**: Accept and decline options
- **Privacy Link**: Optional link to privacy policy
- **Positions**: Top or bottom of screen
- **Auto-hide**: Disappears after user choice

## Storage

User preference is stored in localStorage:
- Key: `cookie-consent`
- Values: `'accepted'` or `'declined'`

## Styling

Uses Tailwind CSS:
- Fixed position banner
- Dark background
- White text
- Primary color accept button
- Secondary decline button

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
