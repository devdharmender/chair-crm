<?php

use App\Models\pages\BlogModel;

if(!function_exists('inserBlogji')){
  
  function inserBlogji($title,$blog_img,$metatitle,$metakeyword,$canonical,$metadesc,$topic,$description){
    
    ($title) ?  $title  : '';
    ($blog_img) ?  $blog_img  : '';
    ($metatitle) ?  $metatitle  : '';
    ($metakeyword) ?  $metakeyword  : '';
    ($canonical) ?  $canonical  : '';
    ($metadesc) ?  $metadesc  : '';
    ($topic) ?  $topic  : '';
    ($description) ?  $description  : '';

    $insdata = [
      	'title' => $title ?? '',
      	'blog_img' => $blog_img ?? '',
      	'metatitle' => $metatitle ?? '',
      	'metakeyword' => $metakeyword ?? '',
      	'canonical' => $canonical ?? '',
      	'metadesc' => $metadesc ?? '',
      	'topic' => $topic ?? '',
      	'description' => $description ?? '',
    ];

    $BlogModel = BlogModel::create($insdata);
    if($BlogModel){
      return $BlogModel;
    }else{
      return false;
    }



  }
}
