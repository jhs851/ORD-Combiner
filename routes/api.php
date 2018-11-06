<?php

$this->namespace('Api')->group(function() {
    Route::prefix('admin')->group(function() {
        // 컬럼
        $this->get('columns', 'ColumnsController');
    });
});
