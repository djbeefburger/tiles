<?php

class Tiles{
  //type (social media, song, mix, etc)
  //image (png)
  //image watermark (png)
  //url (rel?)
  //target (if not local url,_blank)
  //text (html)
  //index (int)
  //position (float)
  private function 
  
  private function addHtmlTtag(&$html_str,$tag_str,$attribute_array=array()){
    if(empty($html)) $html="</$tag>";
    elseif(empty($attribute))$html="<$tag>$html</$tag>";
    elseif(is_array($attribute_mixed))
    else $html="<$tag
    return $html;
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
