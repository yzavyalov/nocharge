<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BadItemsFilter extends AbstractFilter
{
    public const SEARCH = 'search';
    public const PARTNER_ID = 'partner_id';
    public const CATEGORY = 'category';
    public const CREATED_AT = 'created_at';
    public const STATUS = 'status';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this,'search'],
            self::PARTNER_ID => [$this,'partner_id'],
            self::CATEGORY => [$this,'category'],
            self::CREATED_AT => [$this,'created_at'],
            self::STATUS => [$this,'status'],
        ];
    }



    public function search(Builder $builder, $search)
    {
        return $builder->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('text', 'like', '%' . $search . '%')
                ->orWhere('link', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
    }


    public function partner_id(Builder $builder, $partner_id)
    {
        return $builder->where('partner_id',$partner_id);
    }

    public function category(Builder $builder, $category)
    {
        return $builder->where('category',$category);
    }

    public function created_at(Builder $builder, $created_at)
    {
        return $builder->where('created_at','>=',$created_at);
    }

    public function status(Builder $builder, $status)
    {
        return $builder->where('status',$status);
    }
}
