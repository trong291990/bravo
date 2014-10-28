{{ Former::text('name') }}
{{ Former::select('category_id')->options(categories_for_select($categories)) }}
{{ Former::textarea('description')->rows(4) }}