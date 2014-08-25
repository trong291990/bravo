<?php
    echo trans('pagination.info', array(
        'from' => $items->getFrom(),
        'to' => $items->getTo(),
        'total' => $items->getTotal(),
    ));
?>