<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\Bookings;
use App\Models\User;
use App\Models\Brands;
use App\Models\Post;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $vehicles = Vehicle::with([])->get();
        $users = User::with([])->get();
        $testimonial = Testimonial::with([])->get();
        $bookings = Bookings::with([])->get();
        $brands = Brands::with([])->get();
        $blogs =  Post::with([])->get();
        return view('Admin.Layout.content',compact('vehicles','testimonial','bookings','users' ,'brands','blogs'))
            ->with('vehicles', $vehicles)
            ->with('testimonial', $testimonial)
            ->with('bookings', $bookings)
            ->with('users', $users)
            ->with('brands', $brands)
            ->with('blogs', $blogs);

    }
}
