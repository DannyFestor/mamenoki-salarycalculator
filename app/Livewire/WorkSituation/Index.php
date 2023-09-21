<?php

namespace App\Livewire\WorkSituation;

use App\Livewire\Forms\WorkSituationForm;
use App\Models\User;
use App\Models\WorkSituation;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    public WorkSituationForm $form;

    #[Locked]
    public int $user_id;

    #[Url]
    public ?int $year = null;

    #[Url]
    public ?int $month = null;

    public function mount(User $user): void
    {
        $this->user_id = $user->id;

        if (!$this->year) {
            $this->year = now()->year;
        }

        if (!$this->month) {
            $this->month = now()->month;
        }
    }

    public function getQueryString(): array
    {
        return [
            'year' => ['except' => now()->year],
            'month' => ['except' => now()->month],
        ];
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        if ($this->year && $this->month) {
            $workSituation = WorkSituation::query()
                ->where('user_id', $this->user_id)
                ->where('year', $this->year)
                ->where('month', $this->month)
                ->first();

            if ($workSituation) {
                $this->form->setWorkSituation($workSituation);
            } else {
                $this->form->reset();
            }
        }

        return view('livewire.work-situation.index');
    }

    public function setDate(int $year, int $month): void
    {
        $this->year = $year;
        if ($year > now()->year) {
            $this->year = now()->year;
        } elseif ($year < 2000) {
            $this->year = 2000;
        }

        $this->month = $month;
        if ($year >= now()->year && $month > now()->month) {
            $this->month = now()->month;
        } elseif ($month > 12) {
            $this->month = 12;
        } elseif ($month < 1) {
            $this->month = 1;
        }
    }
}
