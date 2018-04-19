<?php 

if(isset($_GET['do']) && $_GET['do']=='ajax') {
  if(isset($_POST['num'])) {
    if( (isset($_POST['id']) && is_numeric($_POST['id']))) {
      $id = $_POST['id'];
      $num = $_POST['num'];

      if(!$_COOKIE["vote-post-".$id]) {
        wp__set_data('vote-total',$id,(int)wp__get_data('vote-total',$id) + 1);
        wp__set_data('vote-rating',$id,(int)wp__get_data('vote-rating',$id) + $num);

        $total = wp__get_data('vote-total',$id);
        $rating = wp__get_data('vote-rating',$id);

        if($total==0) {$total = 1;}

        echo ($rating/($total*5))*100;
      } else {
        echo 'limit';
      }

      die();
    }
  }
  die();
}

function rating($voted=true) {
  if($voted) {
    $disable_class = !!$_COOKIE["vote-post-". get_the_ID()]?' disabled':'';
  } else {
    $disable_class = ' disabled';
  }
  $total = wp__get_data('vote-total',get_the_ID());
  $rating = wp__get_data('vote-rating',get_the_ID());
  
  $total_text = sklonen($total, 'голос', 'голоса', 'голосов', true);
  $total_rec = $total;
  if($total==0) {$total = 1;}
  
  $pr = ($rating/($total*5))*100;
  $abs = round($rating/$total, 1);

  $ratingHTML = '<ol class="rating show-current"><li>5</li><li>4</li><li>3</li><li>2</li><li>1</li><li class="current"><span style="width:'.$pr.'%"></span></li></ol>';

  $richSnp = '<div typeof="v:Rating"><div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"><meta itemprop="bestRating" content="5"><meta property="v:rating" content="'.($abs).'" /><meta itemprop="ratingValue" content="'.($abs).'"><meta itemprop="ratingCount" property="v:votes" content="'.$total.'"></div></div>';

  echo '<div class="vote-block'.$disable_class.'" data-id="'. get_the_ID() .'" data-total="'. $total_rec .'" data-rating="'. $rating .'" rel="v:rating">'.$richSnp.''.$ratingHTML.'</div>';
}

function sklonen($n,$s1,$s2,$s3, $b = false){
  $m = $n % 10; $j = $n % 100;
  if($m==0 || $m>=5 || ($j>=10 && $j<=20)) return $n.' '.$s3;
  if($m>=2 && $m<=4) return  $n.' '.$s2;
  return $n.' '.$s1;
}


function wp__set_data($name, $postID, $value) {
    $count_key = $name;
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        update_post_meta($postID, $count_key, $value);
    }
}
function wp__get_data($name, $postID){
    $count_key = $name;
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}