<?php
Route::get('/pizzas', fn() => Pizza::with('sabores')->paginate(10));