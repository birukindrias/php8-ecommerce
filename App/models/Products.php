<?php

namespace App\App\models;

use App\config\Model;

class Products extends Model
{
    public string $pdisk = '';
    public string $pprice = '';
    public string $pname = '';
    public string $user_id = '';
    public string $pimage = 'none';
    public static function tableName(): string
    {
        return 'products';
    }
    public function rules(): array
    {
        return [
            'pname' => [self::RULE_REQUIRED],
            'pdisk' => [self::RULE_REQUIRED],
            'pprice' => [self::RULE_REQUIRED],
         
        ];
    }
    public function attrs(): array
    {
        return [
            'user_id',
            'pdisk',
            'pprice',
            'pname',
            'pimage'
        ];
    }
}