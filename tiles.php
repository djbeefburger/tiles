<?php



class Tiles{
  /*
  session_start();
  $config['tiles']['tileDir']="/src/json/tiles";
  $config['tiles']['tileFilenameBase']="tile";
  $config['tiles']['tileFileExtension']="json";
  
  //this intends to be an easy way to toggle all writes on or off
  $config['tiles']['blockWrites']=false;
  
  //hardcoded token! find that token and replace in code
  $config['tiles']['token']="kljasdfnlknKNKLjnkjdrfgnkunsdllukzsdf9sdifihasdhv&*h878biub";
  
  //if(empty($_SESSION['tiles'])){
    $t=new Tiles($config['tiles']);
    $tiles=$t->getTiles();
    echo"<h1>hh</h1><pre>".print_r($tiles,true)."</pre>";
    $t->writeTile(array('doug'=>'lazy','happy'=>'days'));
    $t->writeTile(array('id'=>100,'pug'=>'crazy','flappy'=>'days'));
    $tiles=$t->getTiles();
    echo"<h1>vv</h1><pre>".print_r($tiles,true)."</pre>";
    echo"<h1>vv</h1><pre>".print_r($t->getTile(100)),true)."</pre>";
    $t->delTile(100);
    $tiles=$t->getTiles();
  echo"<h1>vv</h1><pre>".print_r($tiles,true)."</pre>";
  
  
  //Each Tile should have a corresponding xml document
  
  //
  //type (social media, song, mix, etc)
  //image (png)
  //image watermark (png)
  //url (rel?)
  //target (if not local url,_blank)
  //text (html)
  //index (int)
  //position (float)
  /*
  <div class="tileClass" id="tileClass_$_id">
    <div class="tileClass tileClassImage" id="tileClassImage_$id">
      <img class="tileClass tileClassImage tileClassImagePath" id="tileClassImagePath_$id" src="$_imagePath" >
    </div>
    <div class="tileClass tileClassWatermark" id="tileClassWatermark_$id">
      <img class="tileClass tileClassWatermark tileClassWatermarkPath" id="tileClassWatermarkPath_$id" src="$_watermarkPath" >
    </div>
    
    <div class="tileClass tileClassUrl" id="tileClassUrl_$id">
      <a href="$_url" target="$_urlTarget" class="tileClass tileClassUrl
    </div>
  </div>*/
  
  
  private 
    $_tileDir,$_tileFilenameBase,$_tileFileExtension,$_canWrite,$_tileIds,$_blockWrites;
  
  public function __construct($config){
    $this->setTileDir($config['tileDir']);
    $this->setTileFilenameBase($config['tileFilenameBase']);
    $this->setTileFileExtension($config['tileFileExtension']);
    $this->setBlockWrites($config['blockWrites']);
    $this->setWriteToken($config['token']);
    $this->_tileIds=$this->getTileIdsFromDirectory();
  }
  
  private function setTileDir($str){
    $this->_tileDir=$str;
  }
  
  private function setTileFilenameBase($str="tile"){
    $this->_tileFilenameBase=$str;
  }
  
  private function setTileFileExtension($str="json"){
    $this->_tileFileExtension=$str;
  }
  
  private function setBlockWrites($boo){
    if($boo)$this->_setBlockWrites=true;
    else $this->_setBlockWrites=false;
  }
    
  private function setWriteToken($token=""){
    if($this->_blockWrites&&$token=="kljasdfnlknKNKLjnkjdrfgnkunsdllukzsdf9sdifihasdhv&*h878biub")$this->_canWrite=true;
    else $this->_canWrite=false;
  }
  
  private function getTileIdsFromDirectory(){
    //expect files with format "{$this->_tileFilenameBase}INT.{$this->_tileFileExtension}"
    $result=array();
    $files=scandir($this->_tileDir,1);
    if(!empty($files))
       foreach($files as $k=>$v){
          $f2=explode(".".$this->_tileFileExtension,str_replace($this->_tileFilenameBase,"",$v));
          if(!empty($f2)){
            $id_number=$f2[0];
            if(strlen($this->_tileFilenameBase . $id_number . ".".$this->_tileFileExtension )!=strlen($v)) unset($files[$k]); 
            else $files[$k]=$id_number;
          }
          else unset($files[$k]); 
       }
    else $files=array();
    //read all filenames in $_tileDir, filter for files with FilenameBase, extract numeric id from filename, append to array 
    return array_values($files);
  }
      
  public function getTile($id){
    if(in_array($id,$this->_tileIds))
      return (array)json_decode(file_get_contents($this->_tileDir.$this->_tileFilenameBase.$id.".".$this->_tileFileExtension));
    else return false;
  }
  
  public function delTile($id){
    if($this->_canWrite){
      $r=unlink("{$this->_tileFileDir}/{$this->_tileFilenameBase}{$arr['id']}.{$this->_tileFileExtension}");
      $this->_tileIds=$this->getTileIdsFromDirectory();
      return $r;
    }else{
      return false;
    }
  }
      
  public function getTiles(){
    $tileIds=getTileIdsFromDirectory();
    foreach($tileIds as $id)$tiles[$id]=$this->getTile($id);
    foreach($tiles as $id=>$tile)if(empty($tiles[$id]))unset($tiles[$id]);
    return $tiles;
  }
  
  private function writeTile($arr){
    if($this->_canWrite){
      if(empty($arr['id']))$arr['id']=time();
      $r= file_put_contents("{$this->_tileFileDir}/{$this->_tileFilenameBase}{$arr['id']}.{$this->_tileFileExtension}",json_encode($arr));  
      $this->_tileIds=$this->getTileIdsFromDirectory();
      return $r;
    }else{
      return false;
    }
    
    
  }
  
  

  
  

}

?>
