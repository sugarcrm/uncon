# Early Preview of Mobile SDK
Version 3.1.0.346 alpha5.

## Installation
1. Download SDK zip and unpack into a temp folder
2. Follow instructions in readme.txt


## Samples
1. Add record action "Capture Notes" to Meetings module.
2. Extend address field type by adding reverse geo-coding.
3. Loading data from external source:
	- TODOs dashlet.
	- TODOs view.

## Build

Specify Sugar instance URL in `config/app-dev.json`.

### Get help for the command line tools:

```sh
$: npm run sdk -- help
```

### Start the development server to debug in Chrome:

```sh
$: npm run sdk -- debug
$: open http://localhost:9000/app
```

### Build native application:

```sh
$: npm run sdk -- init-native
$: npm run sdk -- build-native
```