{{ Former::text('name') }}
{{ Former::select('area_id')->options(areas_for_select($areas))->label('Country') }}
{{ Former::select('type')->options(album_types_for_select())->label('Type') }}
{{ Former::textarea('description')->rows(4) }}