<?php
class Tag{

  private function makeImg(){
    
  }
  
  private function makeA(){
    
  }
  
 
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
