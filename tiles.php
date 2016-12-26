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
  
  private function tagHtml(&$html,$tag){
    $html="<$tag>$html</$tag>";
    return $html;
  }
  
  private function setId(&$html,$id){
    
  }
  
  private function setClass(&$html,$id){
    
  }
  
  

}

?>
