<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Mail\BookingStatusUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingManagementController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()
            ->when(request('status'), function($query) {
                return $query->where('status', request('status'));
            })
            ->paginate(10);
            
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'notes' => 'nullable|string',
            'notify_customer' => 'boolean'
        ]);

        $booking->update([
            'status' => $validated['status'],
            'notes' => $validated['notes']
        ]);

        if ($request->notify_customer) {
            Mail::to($booking->email)
                ->send(new BookingStatusUpdate($booking));
        }

        return redirect()
            ->route('admin.bookings.show', $booking)
            ->with('success', 'Booking status updated successfully');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully');
    }
}
