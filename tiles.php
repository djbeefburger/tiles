<?php

class TileSet extends Tile{
  private $_tiles=array();
  
  public function __construc($config){
    
  }
  
  public function showTiles($options){
    
  }
}

class Tile{
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
    $_tileDir,//the directory in which all tiles are stored, defaults to "xml/tiles"
    $_attributes=array(),
    ;
  
  public function __construct($config){
    if(!empty($config['attributes']))$this->_attributes=$config['attributes'];
    if(!empty(
  }
  
  private function setTileDir($str){
    $this->_tileDir=$str;
  }
  
  private function setTileFilenameBase($str="tile"){
    $this->_tileFilenameBase=$str;
  }
  
  private function setTileFileExtension($str="xml"){
    $this->_tileFileExtension=$str;
  }
  
  private function getTileIdsFromDirectory(){
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
      
      
  
  private function writeTile(){
    //
  }
  
  
  private function makeImg(){
    
  }
  
  private function makeA(){
    
  }
  
  private function make
  
  private function addHtmlTtag(&$html_str,$tag_str,$attributes=array()){
    if(empty($html)) $html="<$tag />";//needs a case for null html, non null attributes
    else $html="<$tag" . $this->formatHtmlAttributeArray($attributes).">$html</$tag>";
    return $html;
  }
  
  private function formatHtmlAttributeArray($arr){
    $output="";
    if(!empty($arr) and is_array($arr))foreach($arr as $attribute=>$value)$output.=$this->formatHtmlAttribute($attribute,$value);
    return $output;
  }
  
  private function formatHtmlAttribute($attribute,$value){
    return " $attribute" . '="' . $value . '"';
  }
  
  private function addHtmAttribute(&$html,$attribute,$value){
    $position=strpos($html,">");
    $part1=substr($html,0,$position-1);
    $part2=substr($html,$position);
    $html=$part1.$this->formatHtmlAttribute($attribute,$value).$part2;
  }
  
  
  private function addHtmlClass(&$html,$id){
    
  }
  
  

}

?>
