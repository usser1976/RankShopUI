<?php

declare(strict_types=1);

namespace RankShop;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use jojoe77777\FormAPI;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\Player;
use pocketmine\Server;
use onebone\economyapi\EconomyAPI;
use RankShop\Main;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getLogger()->info("§aStarting RankShopUI plugin...");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->eco = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
		
		@mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->getResource("config.yml");
    }

    public function checkDepends(){
        $this->formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        if(is_null($this->formapi)){
            $this->getLogger()->error("§4Please install FormAPI Plugin, disabling RankShopUI plugin...");
            $this->getPluginLoader()->disablePlugin($this);
        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args):bool{
        if($cmd->getName() == "rankshop"){
        if(!($sender instanceof Player)){
                $sender->sendMessage("§cPlease use this command from In-game!", false);
                return true;
        }
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createSimpleForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 0:
                    $sender->sendMessage($this->getConfig()->get("cancelled"));
                        break;
                    case 1:
                    $this->rank1($sender);
                        break;
                    case 2:
                    $this->rank2($sender);
                        break;
                    case 3:
                    $this->rank3($sender);
                        break;
                    case 4:
                    $this->rank4($sender);
                        break;
                    case 5:
                    $this->rank5($sender);
                        break;
                    case 6:
                    $this->rank6($sender);
                        break;
                    case 7:
                    $this->rank7($sender);
                        break;
                    case 8:
                    $this->rank8($sender);
                        break;
                    case 9:
                    $this->rank9($sender);
                        break;
                    case 10:
                    $this->rank10($sender);
                        break;
            }
        });
        $form->setContent("Please choose what rank you want to buy");
        $form->addButton("§cExit", 0);
        $form->addButton($this->getConfig()->get("rank1"), 1);
        $form->addButton($this->getConfig()->get("rank2"), 2);
        $form->addButton($this->getConfig()->get("rank3"), 3);
        $form->addButton($this->getConfig()->get("rank4"), 4);
        $form->addButton($this->getConfig()->get("rank5"), 5);
        $form->addButton($this->getConfig()->get("rank6"), 6);
        $form->addButton($this->getConfig()->get("rank7"), 7);
        $form->addButton($this->getConfig()->get("rank8"), 8);
        $form->addButton($this->getConfig()->get("rank9"), 9);
        $form->addButton($this->getConfig()->get("rank10"), 10);
       $form->sendToPlayer($sender);
        }
        return true;
    }

    public function rank1($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank1 = $this->getConfig()->get("rank1.cost");
            if($money >= $rank1){
                
               $this->eco->reduceMoney($sender, $rank1);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank1");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank1.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank1.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank1.cancelled"));
                        break;
            }
        });
        $form->setTitle(($this->getConfig()->get("rank1"));
        $form->setContent($this->getConfig()->get("rank1.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }

    public function rank2($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank2 = $this->getConfig()->get("rank2.cost");
            if($money >= $legend){
                
               $this->eco->reduceMoney($sender, $rank2);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank2");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank2.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank2.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank2.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank2"));
        $form->setContent($this->getConfig()->get("rank2.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }

    public function rank3($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank3 = $this->getConfig()->get("rank3.cost");
            if($money >= $rank3){
                
               $this->eco->reduceMoney($sender, $rank3);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank3");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank3.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank3.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank3.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfif()->get("rank3"));
        $form->setContent($this->getConfig()->get("rank3.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    
    public function rank4($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank4 = $this->getConfig->get("rank4.cost");
            if($money >= $rank4){
                
               $this->eco->reduceMoney($sender, $rank4);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank4");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank4.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank4.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank4.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank4"));
        $form->setContent($this->getConfig()->get("rank4.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank5($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank5 = $this->getConfig()->get("rank5.cost");
            if($money >= $rank5){
                
               $this->eco->reduceMoney($sender, $rank5);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank5");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank5.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank5.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank5.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank5"));
        $form->setContent($this->getConfig()->get("rank5.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank6($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank6 = $this->getCofig()->get("rank6.cost");
            if($money >= $rank6){
                
               $this->eco->reduceMoney($sender, $rank6);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank6");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank6.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank6.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank6.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank6"));
        $form->setContent($this->getConfig()->get("rank6.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank7($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank7 = $this->getConfig()->get("rank7.cost");
            if($money >= $rank7){
                
               $this->eco->reduceMoney($sender, $rank7);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank7");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank7.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank7.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank7.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank7"));
        $form->setContent($this->getConfig()->get("rank7.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank8($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank8 = $this->getConfig()->get("rank8.cost");
            if($money >= $rank8){
                
               $this->eco->reduceMoney($sender, $rank8);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank8");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank8.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank8.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank8.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->("rank8"));
        $form->setContent($this->getConfig()->get("rank8.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank9($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank9 = $this->getConfig()->get("rank9.cost");
            if($money >= $rank9){
                
               $this->eco->reduceMoney($sender, $rank9);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank9");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank9.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank9.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank9.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank9"));
        $form->setContent($this->getConfig()->get("rank9.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }
	
	    public function rank10($sender){
        $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
        $form = $api->createModalForm(function (Player $sender, $data){
            $result = $data;
            if ($result == null) {
            }
            switch ($result) {
                    case 1:
            $money = $this->eco->myMoney($sender);
            $rank10 = $this->getConfig()->get("rank10.cost");
            if($money >= $rank10){
                
               $this->eco->reduceMoney($sender, $rank9);
            $this->getServer()->dispatchCommand(new ConsoleCommandSender(), "setgroup " . $sender->getName() . $this->getConfig()->get("rank10");
            return true;
               $sender->sendMessage($this->getConfig()->get("rank10.buy.success"));
              return true;
            }else{
               $sender->sendMessage($this->getConfig()->get("rank10.no.money"));
            }
                        break;
                    case 2:
               $sender->sendMessage($this->getConfig()->get("rank10.cancelled"));
                        break;
            }
        });
        $form->setTitle($this->getConfig()->get("rank10"));
        $form->setContent($this->getConfig()->get("rank10.content"));
        $form->setButton1("Confirm", 1);
        $form->setButton2("Cancel", 2);
        $form->sendToPlayer($sender);
    }

    public function onDisable(){
        $this->getLogger()->info("§cDisabling RankShopUI plugin...");
    }
}