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
        $rents = BookRent::with(['user', 'book'])->get();
        $users = User::where('role_id', 2)->get();
        $books = Book::where('status', 'available')->orderBy('title', 'asc')->get();
        $current_date = Carbon::now()->toDateString();
        $rent_book = BookRent::all();
        return view('admin.rent-log', [
            'rents' => $rents,
            'users' => $users,
            'books' => $books,
            'curr_date' => $current_date,
        ]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['max_return_date'] = Carbon::now()->addDays(7)->toDateString();

        $book = Book::find($request->book_id)->only(['status', 'stock']);

        $rent_count = BookRent::where('user_id', $request->user_id)->where('return_date', null)->count();

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
                dd($th);
            }
        }
    }

    public function returnBook(Request $request)
    {
        // dd($request->rent_id);
        $return = BookRent::where('id', $request->rent_id)->where('return_date', null)->first();

        $book = Book::find($return->book_id);
        $book->stock += 1;
        if ($book->stock > 0) {
            $book->status = 'available';
        }
        $book->save();
        $return->return_date = Carbon::now()->toDateString();
        $return->save();

        return redirect()->back()->with('success', 'Book returned successfully');
    }


    // make controller for this function
    public function getRent(Request $request)
    {
        $rent = BookRent::with(['user', 'book'])->where('id', $request->id)->first();

        return response()->json($rent);
    }
}
