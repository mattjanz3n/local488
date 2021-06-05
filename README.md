# Local488

This is a monorepo for developing Local488 theme and plugins.

# Development

Requirements:

- Node.js v14 or later
- Docker and Docker Compose
- For synchonizing the local environment: The `scp` command needs to be available. Windows likely doesn't have it by default. If on Windows, use WSL when synchronizing.

## Setup

Run `npm install` then synchronize or use gulp commands listed below.

## Synchronizing

The WordPress prefix for tables needs to be fixed in the local `wp-config.php` manually. Set it to be the same prefix as it is on the live website. Currently, that is `qzpjn_` Unfortunately, this cannot yet be done automatically because of `wp-env` limitations. It should be possible in the future.

Database name also needs to be changed. It's not wordpress, but wp_local488.

## Commands

### Format files

JavaScript:


```
npm run format:js
```

### Start the local server

```
npx wp-env start
```

For other server commands see the `@wordpress/env` package.

### Synchronize

Synchronize local environment with live website.

```
npx gulp env:sync
```
