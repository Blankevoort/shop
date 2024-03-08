<?php

namespace App\Http\Controllers;

use Exception;
use SoapFault;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Illuminate\Support\Facades\Auth;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;

class BookPurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function purchase(Book $book)
    {
        $invoice = new Invoice();
        $invoice->amount($book->price);

        $payment = Payment::callbackUrl(route('purchase.result', [$book->id]));

        $payment->purchase($invoice, function ($driver, $transactionId) {
        });

        return $payment->pay()->render();
    }

    public function result(Request $request, Book $book)
    {
        if ($request->missing('payment_id')) {
            // ...
        }

        $transaction = Transaction::where('payment_id', $request->payment_id)->first();
        if (empty($transaction)) {
            // ...
        }

        if ($transaction->user_id <> Auth::id()) {
            // ...
        }

        if ($book->id <> $transaction->book_id) {
            // ...
        }

        if ($transaction->status <> Transaction::STATUS_PENDING) {
            // ...
        }


        try {
            $receipt = Payment::amount($transaction->paid)
                ->transactionId($transaction->transaction_id)
                ->verify();

            $transaction->transaction_result = $receipt;
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();

            $user = Auth::user();
            $user->purchasedBooks()->create(['book_id' => $book->id]);

            return view('purchase_result')->with([
                'status' => 1,
                'reference_id' => $receipt->getReferenceId(),
                'book' => $book
            ]);
        } catch (Exception | InvalidPaymentException $e) {
            if ($e->getCode() < 0) {
                $transaction->status = Transaction::STATUS_FAILED;
                $transaction->transaction_result = [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ];

                $transaction->save();
            }

            return view('purchase_result')->with([
                'status' => $e->getCode(),
                'message' => $e->getMessage()
            ]);
        }
    }
}
