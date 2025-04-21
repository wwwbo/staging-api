<?php

use App\Http\Middleware\EnsureTokenIsFresh;
use Illuminate\Routing\Middleware\SubstituteBindings;

return [
    EnsureTokenIsFresh::class,
    SubstituteBindings::class,
];
