<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Loan::class);

        $user_id = auth()->user()->id;

        $data['loans'] = Loan::with('book')->where('user_id', '=', $user_id)->get();

        return view('user.loans.index')->with(['data' => $data]);
    }

    public function store(Request $request, $book)
    {
        $this->authorize('create', Loan::class);

        $loan_info = [
            "user_id" => $request->user()->id,
            "book_id" => $book,
            "is_active" => 1,
        ];

        Loan::create($loan_info);

        return redirect()->route('user.books.index');
    }
}
