@section('header_content')
<h1>
    <i class="fa fa-files-o"></i> Tour Itineraries
</h1>
@stop
@section('breadcrumbs')
@include('admin/partials/breadcrumbs', array('breadcrumbs' => Breadcrumbs::generate('list_tours')))
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header">
        <div class="box-tools mall-5 text-right">
            <a href="{{route('admin.tour.edit', $tour->id)}}" class="btn btn-sm btn-primary">Edit Tour</a>
            <button class="btn btn-success" id="btn-add-itinerary"><i class="fa fa-plus"></i> Add</button>
        </div>    	
    </div>
    {{ Former::open(route('tour.itinerary.update', $tour->id))->method('POST') }}
    <div class="box-body">
        <div id="itineraries-wrap">
            <?php foreach ($itineraries as $index => $itinerary) : ?>
                <input type="hidden" name="itineraries[{{$index}}][id]" value="{{$itinerary->id}}">
                <div class="an-itinerary">
                    <div class="mtb-5 text-right">
                        <button type="button" class="btn btn-danger btn-xs btn-remove-itinerary" data-url="{{route('tour.itinerary.delete', [$tour->id, $itinerary->id])}}"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="form-group">
                        <label for="itineraries_{{$index}}_name" class="control-label col-lg-2 col-sm-4">Name</label>
                        <div class="col-lg-10 col-sm-8">
                            <input class="form-control" id="itineraries_{{$index}}_name" name="itineraries[{{$index}}][name]" type="text" value="{{$itinerary['name']}}" required>
                        </div>
                    </div>		
                    <div class="form-group">
                        <label for="itineraries_{{$index}}_hotel" class="control-label col-lg-2 col-sm-4">Hotel</label>
                        <div class="col-lg-10 col-sm-8">
                            <input class="form-control" id="itineraries_{{$index}}_hotel" name="itineraries[{{$index}}][hotel]" type="text" value="{{$itinerary['hotel']}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="itineraries_{{$index}}_detail" class="control-label col-lg-2 col-sm-4">Detail</label>
                        <div class="col-lg-10 col-sm-8">
                            <textarea class="form-control" id="itineraries_{{$index}}_detail" name="itineraries[{{$index}}][detail]" required>{{$itinerary['detail']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-lg-2 col-sm-4">Eating</label>
                        <div class="col-lg-10 col-sm-8" style="padding-left: 35px;">
                            <label class="col-md-3 checkbox">
                                <input name="itineraries[{{$index}}][breakfast]" value="1" type="checkbox" <?php echo $itinerary['breakfast'] ? 'checked' : '' ?>>Breakfast
                            </label>

                            <label class="col-md-3 checkbox">
                                <input name="itineraries[{{$index}}][lunch]" value="1" type="checkbox" <?php echo $itinerary['lunch'] ? 'checked' : '' ?>>Lunch
                            </label>

                            <label class="col-md-3 checkbox">
                                <input name="itineraries[{{$index}}][dinner]" value="1" type="checkbox" <?php echo $itinerary['dinner'] ? 'checked' : '' ?>>Dinner
                            </label>
                        </div>
                    </div>		
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="box-footer">
        <div class="form-group" name="commit">
            <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
                <button class="btn-large btn-primary btn" type="submit">Save</button>
            </div>
        </div>
    </div>
    {{ Former::close() }}
</div>
@stop

@section('inline_scripts')
<script type="text/javascript">
    function createItineraryFieldsHTML(index) {
        var html = '<div class="an-itinerary">' +
                '<div class="mtb-5 text-right">' +
                '<button type="button" class="btn btn-danger btn-xs btn-remove-itinerary"><i class="fa fa-times"></i></button>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="itineraries_' + index + '_name" class="control-label col-lg-2 col-sm-4">Name</label>' +
                '<div class="col-lg-10 col-sm-8">' +
                '<input class="form-control" id="itineraries_' + index + '_name" name="itineraries[' + index + '][name]" type="text" required>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="itineraries_' + index + '_hotel" class="control-label col-lg-2 col-sm-4">Hotel</label>' +
                '<div class="col-lg-10 col-sm-8">' +
                '<input class="form-control" id="itineraries_' + index + '_hotel" name="itineraries[' + index + '][hotel]" type="text">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="itineraries_' + index + '_detail" class="control-label col-lg-2 col-sm-4">Detail</label>' +
                '<div class="col-lg-10 col-sm-8">' +
                '<textarea class="form-control" id="itineraries_' + index + '_detail" name="itineraries[' + index + '][detail]" required></textarea>' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label for="name" class="control-label col-lg-2 col-sm-4">Eating</label>' +
                '<div class="col-lg-10 col-sm-8" style="padding-left: 35px;">' +
                '<label class="col-md-3 checkbox">' +
                '<input name="itineraries[' + index + '][breakfast]" value="1" type="checkbox">Breakfast' +
                '</label>' +
                '<label class="col-md-3 checkbox">' +
                '<input name="itineraries[' + index + '][lunch]" value="1" type="checkbox">Lunch' +
                '</label>' +
                '<label class="col-md-3 checkbox">' +
                '<input name="itineraries[' + index + '][dinner]" value="1" type="checkbox">Dinner' +
                '</label>' +
                '</div>' +
                '</div>' +
                '</div>';
        return html;
    }

    $('#btn-add-itinerary').on('click', function(e) {
        $('#itineraries-wrap').append(createItineraryFieldsHTML($('#itineraries-wrap').find('.an-itinerary').length));
        var $_lastItineraryForm = $('.an-itinerary:last');
        Helper.scroll_to($_lastItineraryForm, 700, null, 30);
        $_lastItineraryForm.find('input:first').focus();
    });

    $(document).on('click', '.btn-remove-itinerary', function(e) {
        var $_this = $(this);
        bootbox.confirm('Are you sure want to delete this itinerary?', function(result) {
            if (result) {
            	if($_this.data('url')) {
            		$.ajax({
            			url: $_this.data('url'),
            			type: 'DELETE',
            			success: function(response) {
            				if(response.success) {
				                $_this.closest('.an-itinerary').fadeOut(500, function() {
				                    $(this).remove();
				                });            					
            				}
            			}
            		});
            		return;
            	} 

                $_this.closest('.an-itinerary').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
    });

</script>
@stop