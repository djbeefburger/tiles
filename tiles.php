<?php

class TileSet extends Tile{
  private $_tiles=array();
  
  public function __construc($config){
    
  }
  
  public function showTiles($options){
    
  }
}

class Tile{
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
  </div>
  private $_attributes=array();
  
  public function __construct($attributes){
    $this->_attributes=$attributes;
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
