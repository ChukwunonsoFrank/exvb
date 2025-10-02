<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\Withdrawal;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]

class Transaction extends Component
{
  public $perPage = 10;

  public $depositsVisibleCount;

  public $totalDeposits;

  public $withdrawalsVisibleCount;

  public $totalWithdrawals;

  public $transactionsVisibleCount;

  public $totalTransactions;

  public $paymentMethods;

  public $activeTab = "all";

  public function mount()
  {
    if (session()->has('message')) {
      $message = session()->get('message');
      $this->dispatch('deposit-created', message: $message)->self();
    }

    $this->paymentMethods = PaymentMethod::all();
    $this->totalDeposits = Deposit::where('user_id', auth()->user()->id)->count();
    $this->depositsVisibleCount = min($this->perPage, $this->totalDeposits);
    $this->totalWithdrawals = Withdrawal::where('user_id', auth()->user()->id)->count();
    $this->withdrawalsVisibleCount = min($this->perPage, $this->totalWithdrawals);
    $this->totalTransactions = $this->totalDeposits + $this->totalWithdrawals;
    $this->transactionsVisibleCount = min($this->perPage, $this->totalTransactions);
  }

  public function loadMoreDeposits(): void
  {
    $this->activeTab = "deposits";
    $this->depositsVisibleCount = min($this->depositsVisibleCount + $this->perPage, $this->totalDeposits);
  }

  public function loadMoreWithdrawals(): void
  {
    $this->activeTab = "withdrawals";
    $this->withdrawalsVisibleCount = min($this->withdrawalsVisibleCount + $this->perPage, $this->totalWithdrawals);
  }

  public function loadMoreTransactions(): void
  {
    $this->activeTab = "all";
    $this->transactionsVisibleCount = min($this->transactionsVisibleCount + $this->perPage, $this->totalTransactions);
  }

  public function getPaymentMethodIconUrl(string $paymentMethod): string
  {
    $filtered = $this->paymentMethods->filter(function (PaymentMethod $value, $key) use ($paymentMethod) {
      return $value['name'] === $paymentMethod;
    });

    return $filtered->first()['icon_url'];
  }

  public function getStatusIndicatorColor(string $status)
  {
    if ($status === 'pending') {
      return 'bg-yellow-600';
    }

    if ($status === 'confirmed' || $status === 'completed') {
      return 'bg-green-600';
    }

    if ($status === 'declined') {
      return 'bg-red-600';
    }
  }

  public function render()
  {
    $deposits = Deposit::where('user_id', auth()->user()->id)
      ->latest()
      ->take($this->depositsVisibleCount)
      ->get();

    $withdrawals = Withdrawal::where('user_id', auth()->user()->id)
      ->latest()
      ->take($this->withdrawalsVisibleCount)
      ->get();

    $depositTransactions = Deposit::where('user_id', auth()->user()->id)
      ->latest()
      ->get()
      ->map(function ($deposit) {
        return [
          'id' => $deposit->id,
          'type' => 'Deposit',
          'amount' => $deposit->amount,
          'status' => $deposit->status,
          'created_at' => $deposit->created_at,
          'created_at_formatted' => $deposit->getCreatedAtFormattedAttribute(),
        ];
      });

    $withdrawalTransactions = Withdrawal::where('user_id', auth()->user()->id)
      ->latest()
      ->get()
      ->map(function ($withdrawal) {
        return [
          'id' => $withdrawal->id,
          'type' => 'Withdrawal',
          'amount' => $withdrawal->amount,
          'status' => $withdrawal->status,
          'created_at' => $withdrawal->created_at,
          'created_at_formatted' => $withdrawal->getCreatedAtFormattedAttribute(),
        ];
      });

    $transactions = collect($depositTransactions)
      ->merge($withdrawalTransactions)
      ->sortByDesc('created_at')
      ->take($this->transactionsVisibleCount)
      ->values();

    $showDepositsLoadMoreButton = $this->depositsVisibleCount < $this->totalDeposits;
    $showWithdrawalsLoadMoreButton = $this->withdrawalsVisibleCount < $this->totalWithdrawals;
    $showTransactionsLoadMoreButton = $this->transactionsVisibleCount < $this->totalTransactions;

    return view('livewire.dashboard.transaction', [
      'deposits' => $deposits,
      'withdrawals' => $withdrawals,
      'transactions' => $transactions,
      'showDepositsLoadMoreButton' => $showDepositsLoadMoreButton,
      'showWithdrawalsLoadMoreButton' => $showWithdrawalsLoadMoreButton,
      'showTransactionsLoadMoreButton' => $showTransactionsLoadMoreButton,
    ]);
  }
}
