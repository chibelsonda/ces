<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomService{

    /** 
     * @return LengthAwarePaginator
     */
    public function getAll() : LengthAwarePaginator
    {
        return Room::latest()->paginate(5);
    }

    public function getRooms()
    {
        return Room::all();
    }

    public function store($course) 
    {
        return Room::insert($course);
    }

}