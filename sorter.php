<?php

class WordSorter {

	private $string;
	private $words;

	public function __construct($str){
		$this->string = $str;			
	}

	public function setString($str){
		$this->string = $str;
	}

	public function getString(){
		return $this->string;
	}

	public function getWords(){
		return $this->words;
	}

	public function breakString(){

		$word="";
		$this->words = array();
		$string = $this->string;

		for($i=0,$l=strlen($string);$i<$l;$i++){
			if($string[$i]!=' ' && $i<$l-1){
				$word .= $string[$i];
			}
			else{
				if($i==$l-1)
					$word .= $string[$i];
				$this->words[] = $word;
				$word = "";
			}
		}
	}

	public function sortWords(){
		if(!is_array($this->words))
			$this->breakString();
		$words = $this->words;
		$i = 1;
		$count = count($words);

		while($i < $count){
			print $i."<br>";
			if($words[$i] < $words[$i-1]){
				print "moving<br>";
				$temp = $words[$i];
				$words[$i] = $words[$i-1];
				$words[$i-1] = $temp;
				if($i>1){
					$i -= 2;
				}
			}
			$i++;
		}
		$this->words = $words;
	}



}
$sorter = new WordSorter("One Two Three Four Five Six");
$sorter->sortWords();
var_dump($sorter->getWords());