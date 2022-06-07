<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Services\RoomService;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{

    public function __construct(
        private $roomService = new RoomService()
    ){}

    public function index()
    {
        $rooms = $this->roomService->getAll();

        return view('room.index', compact('rooms'))
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(StoreRoomRequest $request)
    {
        $room = $request->except(['_token','_method']);

        $this->roomService->store($room);
        
        return redirect()->route('rooms.index')
                ->with('success','Room has been created successfully.');
        
    }

    public function show(Room $room)
    {
        return view('room.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->except(['_token','_method']);

        $room->update($data);
      
        return redirect()->route('rooms.index')
               ->with('success','Room has been updated successfully');
    }

    public function destroy(Room $room)
    {  
        $room->delete();

        return redirect()->route('rooms.index')
                ->with('success','Room has been deleted successfully');
        
    }
}
