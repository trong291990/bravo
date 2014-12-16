{{ Former::text('first_name') }}
{{ Former::text('last_name') }}
{{ Former::email('email') }}
{{ Former::string('nationality') }}
{{ Former::string('languages') }}
<?php
if (isset($specialist)) {
    $specialist_area_ids = $specialist->areas()->lists('id');
} else {
    $specialist_area_ids = [];
}
?>
<div class='form-group'> 
    <label for="email" class="control-label col-lg-2 col-sm-3">Countries</label>
    <div class="col-lg-10 col-sm-9">
        <select class="form-control" multiple="true" id="area_ids[]" name="area_ids[]">
            <?php foreach ($areas as $area) : ?>
                <option value="{{ $area->id }}" <?php echo in_array($area->id, $specialist_area_ids) ? 'selected' : '' ?>> {{ $area->name }}</option>
            <?php endforeach; ?>
        </select>
    </div>
</div>