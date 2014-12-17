{{ Former::text('first_name') }}
{{ Former::text('last_name') }}
{{ Former::email('email') }}
{{ Former::string('nationality') }}
{{ Former::string('languages') }}
<?php
if (isset($specialist)) {
    $specialist_area_ids = $specialist->areas()->lists('id');
    $specialties = $specialist->specialties;
} else {
    $specialist_area_ids = [];
    $specialties = [];
}
?>
<div class="form-group">
    <label class="control-label col-lg-2 col-sm-3">Specialties</label>
    <div class="col-lg-10 col-sm-9">
        <ul class="list-unstyled staff-specialties">
            @foreach($specialties as $item)
                <li>
                    <input class="form-control" name="specialties[]" value="{{$item}}" style="margin-bottom: 10px" />
                </li>
            @endforeach
            @for($i = 0; $i < (Specialist::MAX_SPECIALTIEST - count($specialties)); $i++)
                <li>
                    <input class="form-control" name="specialties[]" style="margin-bottom: 10px"/>
                </li>
            @endfor                         
        </ul>        
    </div>
</div> 

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