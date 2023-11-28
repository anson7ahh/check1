<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user extends Model
{
    use HasFactory;
    public function connet()
    {
        try {
            DB::connection()->getPdo();
            return "Connection to the database established successfully!";
        } catch (\Exception $e) {
            return "Could not connect to the database. " . $e->getMessage();
        }
    }
    protected $table = 'users';
    public function getalluser()
    {
        $user = DB::select('SELECT * FROM users');
        return $user;
    }
    public function adduser($data)
    {
        DB::insert('INSERT INTO users (name,password,email) values(?,?,?)', $data);
    }
}
