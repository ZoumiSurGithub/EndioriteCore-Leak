<?php

namespace endiorite;

use endiorite\API\ClearLag;
use endiorite\API\CommandsAPI;
use endiorite\API\CustomBlockLoad;
use endiorite\API\CustomItemLoad;
use endiorite\API\EnderChestAPI;
use endiorite\API\EventsAPI;
use endiorite\API\HomeAPI;
use endiorite\API\RankAPI;
use endiorite\API\TasksLoad;
use endiorite\API\Utils;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

    public static Main $instance;

    public Utils $utils;
    public ClearLag $clearLag;
    public EventsAPI $eventsAPI;
    public CustomBlockLoad $customBlockLoad;
    public CustomItemLoad $customItemLoad;
    public HomeAPI $homeAPI;
    public CommandsAPI $commandsAPI;
    public TasksLoad $tasksLoad;
    public EnderChestAPI $enderChestAPI;

    public Config $rankConfig;

    protected function onEnable(): void {
        self::$instance = $this;
        $this->utils = new Utils();
        $this->clearLag = new ClearLag();
        $this->eventsAPI = new EventsAPI();
        $this->customBlockLoad = new CustomBlockLoad();
        $this->customItemLoad = new CustomItemLoad();
        $this->homeAPI = new HomeAPI();
        $this->commandsAPI = new CommandsAPI();
        $this->tasksLoad = new TasksLoad();
        $this->enderChestAPI = new EnderChestAPI();

        $this->rankConfig = new Config($this->getDataFolder() . "rank.yml");

        $this->clearLag->init();

        @mkdir($this->getDataFolder() . "stats");
        $this->getServer()->getNetwork()->setName("§l§9Endiorite §fV3§r");

        if(!InvMenuHandler::isRegistered()) {
            InvMenuHandler::register($this);
        }

        parent::onEnable(); // TODO: Change the autogenerated stub
    }

}