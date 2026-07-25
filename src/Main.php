<?php

declare(strict_types=1);

namespace BedrockNexus\ExamplePlugin;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

final class Main extends PluginBase implements Listener
{
    protected function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        $this->getLogger()->info("BedrockNexusExample is enabled.");
    }

    public function onPlayerJoin(PlayerJoinEvent $event): void
    {
        if (!$this->getConfig()->get("send-welcome-message", true)) {
            return;
        }

        $message = $this->getConfiguredMessage(
            "welcome-message",
            "&aWelcome, &f{player}&a!"
        );

        $event->getPlayer()->sendMessage(
            str_replace("{player}", $event->getPlayer()->getName(), $message)
        );
    }

    /**
     * @param string[] $args
     */
    public function onCommand(
        CommandSender $sender,
        Command $command,
        string $label,
        array $args
    ): bool {
        if ($command->getName() !== "nexusexample") {
            return false;
        }

        $message = $this->getConfiguredMessage(
            "command-message",
            "&bHello, &f{player}&b! This message came from a PocketMine plugin."
        );

        $sender->sendMessage(str_replace("{player}", $sender->getName(), $message));
        return true;
    }

    private function getConfiguredMessage(string $key, string $default): string
    {
        $configured = $this->getConfig()->get($key, $default);
        $message = is_string($configured) ? $configured : $default;

        return TextFormat::colorize($message);
    }
}
