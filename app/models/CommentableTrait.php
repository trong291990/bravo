<?php

trait CommentableTrait {

    public function comments() {
        return $this->morphMany('Comment', 'commentable');
    }

    public function buildComment($attrs) {
        $comment = new Comment($attrs);
        $comment->commentable_id = $this->id;
        $comment->commentable_type = get_class($this);
        return $comment;
    }

}

?>