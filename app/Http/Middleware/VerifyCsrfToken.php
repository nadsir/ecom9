<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "/admin/checkpassword",
        "/admin/update-admin-status",
        "/admin/update-category-status",
        "/append-categories-level",
        "/admin/update-image-status",
        "/admin/update-attribute-status",
        "/admin/update-banner-status",
        "/admin/category-filters",
        "get-product-price"

    ];
}
