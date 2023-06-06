<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\BookRent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function index()
    {
        $rents = BookRent::all();
        $users = User::where('role_id', 2)->get();
        $books = Book::where('status', 'available')->orderBy('title', 'asc')->get();

        return view('admin.rent-log', [
            'rents' => $rents,
            'users' => $users,
            'books' => $books,
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(7)->toDateString();

        $book = Book::find($request->book_id)->only(['status', 'stock']);

        $rent_count = BookRent::where('user_id', $request->user_id)
            ->where('rent_date', '>=', Carbon::now()->subDays(7)->toDateString())
            ->count();

        if($rent_count >= 3) {
            return redirect()->back()->with('error', 'User have reached the maximum number of books you can rent in a week');
        } else {
            try {
                DB::beginTransaction();

                $book = Book::find($request->book_id);
                $book->stock -= 1;
                if ($book->stock == 0) {
                    $book->status = 'unavailable';
                }
                $book->save();

                BookRent::create($request->all());

                DB::commit();

                return redirect()->back()->with('success', 'Book rented successfully');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }

        // try {
        //     DB::beginTransaction();

        //     $book = Book::find($request->book_id);
        //     $book->stock -= 1;
        //     if ($book->stock == 0) {
        //         $book->status = 'unavailable';
        //     }
        //     $book->save();

        //     BookRent::create($request->all());

        //     DB::commit();

        //     return redirect()->back()->with('success', 'Book rented successfully');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        // }
    }
}
