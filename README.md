# Local488

This is a monorepo for developing Local488 theme and plugins.

The theme and plugin files are in `src/` subdirectories.

# Development

Requirements:

- Node.js v14 or later
- Docker and Docker Compose
- For synchonizing the local environment: The `scp` command needs to be available. Windows likely doesn't have it by default. If on Windows, use WSL when synchronizing.

## Setup

Run `npm install` then synchronize with live website or use commands listed below.

## Synchronizing for the first time

Run the synchronization command
```
npx gulp env:sync
```

After synchronizing, the WordPress prefix for tables needs to be fixed in the local `wp-config.php` manually. Set it to be the same prefix as it is on the live website. Currently, that is `qzpjn_`. Unfortunately, this cannot yet be done automatically because of `wp-env` limitations. It should be possible in the future.

## Synchronizing later

On every later synchronization, you just need to make sure that the server is started: `npx wp-env start`, and then run `npx gulp env:sync`

## Destroy local environment and synchronize again

Run
```
npx gulp env:resync
```

## Commands

### Run build tests

```
npm run test
```

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
