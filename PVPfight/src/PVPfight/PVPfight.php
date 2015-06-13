<?php

namespace PVPfight;

use pocketmine\plugin\PluginBase;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\TextFormat;
use pocketmine\item\Item;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent; //ﾌﾟﾚｲﾔｰがﾛｸﾞｲﾝした時のｲﾍﾞﾝﾄ
use pocketmine\inventory\PlayerInventory; //インベントリ関連
use pocketmine\event\player\PlayerInteractEvent; //タップイベント
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\entity\effect;

class PVPfight extends PluginBase implements Listener{

	

	public function onEnable () {
		$this->getServer()->getPluginManager()->registerEvents($this, $this); //イベントの登録
	}

	public function playerBlockTouch(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		$block = $event->getBlock();
		$dsword = Item::get(276,0,1);//ダイヤ剣
		$compass = Item::get(345,0,1);//コンパス
		if($block->getID() == 41){
			$player->sendMessage("you are fighter");
			$player->getInventory()->setContents(array(Item::get(0, 0, 0)));
			$player->getInventory()->addItem($dsword);
			$player->getInventory()->addItem($compass);
			$player->setNameTag("");

			$player->removeAllEffects();

			$effect = Effect::getEffect(1);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(2);
			$player->addEffect($effect);

			$effect = Effect::getEffect(8);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(2);
			$player->addEffect($effect);
		}elseif($block->getID() == 42){
			$player->sendMessage("you are hunter");
			$player->getInventory()->setContents(array(Item::get(0, 0, 0)));
			$player->getInventory()->setArmorItem(0,Item::get(298,0,1));//ヘルメット
			$player->getInventory()->setArmorItem(1,Item::get(299,0,1));//チェストプレート
			$player->getInventory()->setArmorItem(2,Item::get(300,0,1));//レギンス
			$player->getInventory()->setArmorItem(3,Item::get(301,0,1));//ブーツ
			$player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem($dsword);
			$player->setNameTag("");

			$player->removeAllEffects();

			$effect = Effect::getEffect(1);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(1);
			$player->addEffect($effect);

			$effect = Effect::getEffect(5);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(2);
			$player->addEffect($effect);

			$effect = Effect::getEffect(11);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(1);
			$player->addEffect($effect);
		}elseif($block->getID() == 57){
			$player->sendMessage("you are asashin");
			$player->getInventory()->setContents(array(Item::get(0, 0, 0)));
			$player->getInventory()->setArmorItem(3,Item::get(301,0,1));//ブーツ
			$player->getInventory()->sendArmorContents($player);
			$player->getInventory()->addItem($dsword);
			$player->setNameTag("");

			$player->removeAllEffects();

			$effect = Effect::getEffect(5);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$effect->setAmplifier(3);
			$player->addEffect($effect);
/**
			$effect = Effect::getEffect(9);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$player->addEffect($effect);
**/
			$effect = Effect::getEffect(14);
			$effect->setVisible(true);
			$effect->setDuration(99999);
			$player->addEffect($effect);

			$effect = Effect::getEffect(20);
			$effect->setVisible(false);
			$effect->setDuration(99999);
			$player->addEffect($effect);
		}
    	}

	public function onjoin(PlayerJoinEvent $event){
		//プレイヤーが参加
	}


}
