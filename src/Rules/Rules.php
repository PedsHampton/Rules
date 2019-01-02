<?php
namespace Rules;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
class Rules extends PluginBase implements Listener{
    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
        $this->getLogger()->info("Rules Plugin Enabled By PedsHampton");
    } 
    public function onDisable(): void{
        $this->getLogger()->info("Rules Plugin Disabled By PedsHampton");
    }
    public function onLoad(): void{
        $this->getLogger()->info("Rules Plugin Requires FormAPI To Work");
    }
    public function checkDepends(): void{
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("Rules Plugin Requires FormAPI To Work");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "rules"){
            if(!($sender instanceof Player)){
                $sender->addTitle("", false);
                return true;
            }
            $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
            $form = $api->createSimpleForm(function (Player $sender, $data){
                $result = $data;
                if ($result == null) {
                }
                switch ($result) {
                    case 0:
                        $sender->addTitle("");
                        break;
                    case 1:
                        $sender->addTitle("");
                        break;
                }
            });
            $form->setTitle("");
            $form->setContent("");
            $form->addButton("");
            $form->sendToPlayer($sender);
        }
        return true;
    }
}
