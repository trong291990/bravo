<?php

trait CommentableTrait {

    public function comments() {
        return $this->morphMany('Comment', 'commentable');
    }

    public function loadComments($authoried = true) {
        if ($authoried) {
            return $this->comments()->authorized()->with('customer')->get();
        } else {
            return $this->comments()->with('customer')->get();
        }
    }

    public function buildComment($customer, $attrs) {
        $comment = new Comment($attrs);
        $comment->commentable_id = $this->id;
        $comment->commentable_type = get_class($this);
        $comment->customer_id = $customer->id;
        return $comment;
    }

    public function avgRate() {
        return $this->comments()->avg('score');
    }

}

?>