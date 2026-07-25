# BedrockNexus Example Plugin

A small, production-shaped example plugin for
[PocketMine-MP](https://github.com/pmmp/PocketMine-MP) API 5.

It demonstrates:

- a `PluginBase` entry point;
- event listener registration;
- a command and permission declared in `plugin.yml`;
- a bundled, editable configuration file; and
- configurable messages with `&` color codes and `{player}` placeholders.

## Try it

1. Install PocketMine-MP 5 and the
   [DevTools](https://github.com/pmmp/DevTools) plugin.
2. Copy this repository into the server's `plugins` directory.
3. Start or restart the server.
4. Join the server and run `/nexusexample`.

PocketMine-MP creates
`plugin_data/BedrockNexusExample/config.yml` on first startup. Edit that copy to
change the welcome and command messages, then restart the server.

## Build a PHAR

From the server console, run:

```text
/makeplugin BedrockNexusExample
```

DevTools writes the distributable PHAR to its configured output directory.
Place that PHAR in a PocketMine-MP server's `plugins` directory and restart the
server to install it.

## Project layout

```text
.
├── plugin.yml
├── resources/
│   └── config.yml
└── src/
    └── Main.php
```

## Requirements

- PocketMine-MP API 5.0.0 or newer within the 5.x API series
- PHP 8.1 or newer

## License

[MIT](LICENSE)
