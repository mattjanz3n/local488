# Local488

This is a monorepo for developing Local488 theme and plugins.

The theme and plugin files are in `src/` subdirectories.

The root directory handles synchronization with the live website, local server setup and related tests.

# Development

Requirements:

- Node.js v14 or later
- Docker and Docker Compose
- For synchonizing the local environment: The `scp` command needs to be available. Windows likely doesn't have it by default. If on Windows, use WSL when synchronizing.

## Setup

Install npm dependencies

```
npm install
```

Install composer dependencies

```
composer install
```

Synchronize local environment with the live website, or run any of the commands listed below.

To make changes to the theme or plugin, use instructions in their README. Eventually, all commands will be run from the repository root, but for now subdirectories in `src/` must be setup for development separately.

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

### Formatting and linting

- `npm run lint` Lint and format everything.
- `npm run format:js` Format JavaScript.
- `npm run lint:styles` Lint styles.
- `npm run lint:php` Lint PHP.
- `npm run lint:php:fix` Lint PHP and fix errors automatically.


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
