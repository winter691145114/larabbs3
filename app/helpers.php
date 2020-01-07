<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function category_nav_active($category_id)
{
    return active_class((if_route('categories.show') && if_route_param('category',$category_id)));
}


function make_excerpt($value, $length=200)
{
    $excerpt = trim(preg_replace('/\r\n|\r\n+/','',strip_tags($value)));
    return str_limit($excerpt, $length);
}

function model_admin_link($value,$model)
{
    return model_link($value,$model,'admin');
}

function model_link($value,$model,$prefix="")
{
    $model_name = model_plural_name($model);
    $prefix = $prefix ? "/$prefix/" : '/';
    $path = config('app.url').$prefix.$model_name.'/'.$model->id;
    return '<a href="'.$path.'" target="_blank">'.$value.'</a>';
}

function model_plural_name($model)
{
    $full_name = get_class($model);
    $class_name = class_basename($full_name);
    $snake_name = snake_case($class_name);
    return str_plural($snake_name);
}
