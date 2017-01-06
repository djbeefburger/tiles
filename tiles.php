<?php

class Tiles{
/*  session_start();
  $config['tiles']['tileDataDir']="src/json/tiles";
  $config['tiles']['tileFilenameBase']="tile";
  $config['tiles']['tileFileExtension']="json";
  
  //this intends to be an easy way to toggle all writes on or off
  $config['tiles']['blockWrites']=false;
  
  //hardcoded token! find that token and replace in code
  $config['tiles']['token']="kljasdfnlknKNKLjnkjdrfgnkunsdllukzsdf9sdifihasdhv&*h878biub";
  
  $t=new Tiles($config['tiles']);
  $tiles=$t->getTiles();
  echo"<h1>nocachepls</h1>".time()."<pre>".print_r($tiles,true)."</pre>";
  
  $t->writeTile(array('doug'=>'lazy','happy'=>'days'));
  $tiles=$t->getTiles();
  echo"<h1>mh</h1><pre>".print_r($tiles,true)."</pre>";
  $t->writeTile(array('id'=>100,'pug'=>'crazy','flappy'=>'days'));
  $tiles=$t->getTiles();
  echo"<h1>vv</h1><pre>".print_r($tiles,true)."</pre>";
  echo"<h1>vv</h1><pre>".print_r($t->getTile(100),true)."</pre>";
  $t->delTile(100);
  $tiles=$t->getTiles();
  echo"<h1>vv</h1><pre>".print_r($tiles,true)."</pre>";*/
 
  
  private 
    $_tileDataDir,$_tileFilenameBase,$_tileFileExtension,$_canWrite,$_tileIds,$_blockWrites;
  
  public function __construct($config){
    $this->setTileDataDir($config['tileDataDir']);
    $this->setTileFilenameBase($config['tileFilenameBase']);
    $this->setTileFileExtension($config['tileFileExtension']);
    $this->setBlockWrites($config['blockWrites']);
    if(!empty($config['token']))$this->setWriteToken($config['token']);
    $this->_tileIds=$this->getTileIdsFromDirectory();
  }
  
  private function setTileDataDir($str){
    $this->_tileDataDir=$str;
	//die($this->_tileDataDir);
  }
  
  private function setTileFilenameBase($str="tile"){
    $this->_tileFilenameBase=$str;
  }
  
  private function setTileFileExtension($str="json"){
    $this->_tileFileExtension=$str;
  }
  
  private function setBlockWrites($boo){
    if($boo)$this->_blockWrites=true;
    else $this->_blockWrites=false;
  }
    
  private function setWriteToken($token=""){
    if(!$this->_blockWrites&&$token=="l;kasdfnasdf098asd098jaspjdv0asu-asdfv-asdvja-sjv-asd-0as9djcoq3i4jrl2oi8a98s98(*7978")$this->_canWrite=true;
    else $this->_canWrite=false;
  }
  
  private function getTileIdsFromDirectory(){
    //expect files with format "{$this->_tileFilenameBase}INT.{$this->_tileFileExtension}"
    $result=array();
    $files=scandir($this->_tileDataDir,1);
	//die($this->_tileDataDir.print_r( $files,true));
    if(!empty($files)){
       foreach($files as $k=>$v){
          $f2=explode(".{$this->_tileFileExtension}",str_replace($this->_tileFilenameBase,"",$v));
          if(!empty($f2)){
            $id_number=$f2[0];
            if(strlen($this->_tileFilenameBase . $id_number . ".".$this->_tileFileExtension )!=strlen($v)) unset($files[$k]); 
            else $files[$k]=$id_number;
          }
          else unset($files[$k]); 
       }
    }else $files=array();
    //read all filenames in $_tileDataDir, filter for files with FilenameBase, extract numeric id from filename, append to array 
	//die($this->_tileDataDir.print_r( $files,true));
    return array_values($files);
  }
      
  public function getTile($id){
    if(in_array($id,$this->_tileIds)){
		//die('FOUNDIT');
      return (array)json_decode(file_get_contents($this->_tileDataDir."/".$this->_tileFilenameBase.$id.".".$this->_tileFileExtension));
    }else return false;
  }
  
  public function delTile($id){
    if($this->_canWrite){
		$filename="{$this->_tileDataDir}/{$this->_tileFilenameBase}{$id}.{$this->_tileFileExtension}";
		//die($filename);
      $r=unlink($filename);
      $this->_tileIds=$this->getTileIdsFromDirectory();
      return $r;
    }else{
      return false;
    }
  }
      
  public function getTiles(){
    $this->_tileIds=$this->getTileIdsFromDirectory();
    foreach($this->_tileIds as $id)$tiles[$id]=$this->getTile($id);
    foreach($tiles as $id=>$tile)if(empty($tiles[$id]))unset($tiles[$id]);
    return $tiles;
  }
  
  public function writeTile($arr){
	//returns the new d or false
    if($this->_canWrite){
	  if(empty($arr['id']))$arr['id']=time();
	  $filepath="{$this->_tileDataDir}/{$this->_tileFilenameBase}{$arr['id']}.{$this->_tileFileExtension}";
      $r= file_put_contents($filepath,json_encode($arr));  
	  $this->_tileIds=$this->getTileIdsFromDirectory();
      return ($r?$arr['id']:false);
    }else{
      return false;
    }
  }
  
}


?>
