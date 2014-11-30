<?php  
trait CommentableTrait {

  public function comments() {
    return $this->morphMany('Comment', 'commentable');
  }
}
?>