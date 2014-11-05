{{ Former::text('name') }}
{{ Former::select('area_id')->options(areas_for_select($areas)) }}
{{ Former::textarea('description')->rows(4) }}