<?php

namespace SLJ\SLJLaravelClient\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->fillable = array_merge($this->fillable, [
            'sljs_id',
            'sljs_access_token',
            'sljs_refresh_token',
        ]);
        $this->hidden = array_merge($this->hidden, [
            'sljs_id',
            'sljs_access_token',
            'sljs_refresh_token',
        ]);
    }
}