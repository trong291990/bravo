<?php if (count($errors->getMessages()) > 0) : ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4> Could not save the form: </h4>
        <ul>
            <?php foreach ($errors->getMessages() as $message): ?>
                <li>
                    {{ $message[0] }}
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>