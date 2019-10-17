<?php

Route::apiresource('/question', 'QuestionController');

Route::apiresource('/category', 'CategoryController');

Route::apiresource('question/{question}/reply', 'ReplyController');