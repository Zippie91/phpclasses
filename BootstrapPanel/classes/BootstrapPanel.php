<?php 
class BootstrapPanel 
{
	private $title;
	private $name;
	private $date;
	private $sdate;
	private $text;
	
	public function __construct($phpobject)
	{
		getValues($phpobject);
		return buildHTML();
	}
	
	private function buildHTML()
	{
		$HTML = "	<div class='panel panel-default'>
						<div class='panel-heading'>
							<div class='col-xs-12 col-sm-6'>
								<h5>{$this->title} <small><em><a href='#'>{$this->name}</a></em></small></h5>
							</div>
							<div class='col-xs-12 col-sm-6'>
								<h5 class='text-right'><small class='hidden-xs'>{$this->date}</small></h5>
								<h6><small class='visible-xs'>{$this->sdate}</small></h6>
							</div>
							<div class='clearfix'></div>
						</div>
						<div class='panel-body'>
							<p>{$this->text}</p>
						</div>
					</div>"
		
		return $HTML;
	}
	
	private function getValues($object) 
	{
		$this->title = $object->title;
		$this->name = name($object->name, $object->surname);
		$this->date = formatDate($object->date, normal);
		$this->sdate = formatDate($object->date, small);
		$this->text = $object->text;
	}
	
	private function name($name, $surname)
	{
		return $name . " " . $surname;
	}
	
	private function formateDate($timestamp, $type) 
	{
		switch($type) {
			case "small":
				return date("d F Y", $timestamp);
			case "normal":
				return date("l d F Y", $timestamp);
			default: 
				return date("d/m/Y", $timestamp);
		}
	}
}
?>
