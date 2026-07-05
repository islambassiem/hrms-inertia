<?php

declare(strict_types=1);

namespace App\Queries\Hr;

use App\Domain\Employee\Enums\CategoryEnum;
use App\Domain\Employee\Models\Category;
use Illuminate\Database\Eloquent\Builder;

final class CategoryListQuery
{
    /**
     * @return Builder<Category>
     */
    public function build(?CategoryEnum $category = null): Builder
    {
        return Category::query()
            ->select('id', 'name')
            ->when($category, function ($query, $category) {
                $query->where('category_id', $category->value);
            });
    }
}
