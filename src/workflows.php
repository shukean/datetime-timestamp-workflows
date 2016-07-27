<?php

//https://www.alfredapp.com/help/workflows/inputs/script-filter/xml/

class workflows{

	private $items;

	public function __construct(){
		$this->items = new SimpleXMLElement("<items></items>");
	}

	public function set($uid, $arg, $valid, $autocomplete, $type, 
		$title, $subtitle, $icon = null, $mod = null, $text = null, $quicklookurl = null){
		
		$item = $this->items->addChild('item');
		is_null($uid) || $item->addAttribute("uid", $uid);
		is_null($arg) || $item->addAttribute("arg", $arg);
		is_null($valid) || $item->addAttribute("valid", $valid);
		is_null($autocomplete) || $item->addAttribute("autocomplete", $autocomplete);
		is_null($type) || $item->addAttribute("tyep", $type);
		if (!is_null($title)){
			$item->addChild("title", $title);
		}
		if (!is_null($subtitle)){
			$item->addChild("subtitle", $subtitle);
		}
		if (!is_null($icon)){
			$item->addChild("icon", $icon);
		}
		if (!is_null($mod)){
			$item->addChild("mod", $mod);
		}
		if (!is_null($text)){
			$item->addChild("text", $text);
		}
		if (!is_null($quicklookurl)){
			$item->addChild("quicklookurl", $quicklookurl);
		}
	}

	public function toXml(){
		return $this->items->asXML();	
	}
}