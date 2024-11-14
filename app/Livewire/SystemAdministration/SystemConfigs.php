<?php

namespace App\Livewire\SystemAdministration;

use App\Models\Trc20USDT;
use Livewire\Component;

class SystemConfigs extends Component
{
    public $trc20Usdt;
    public $trc20UsdtAddress;
    public $trc20UsdtInstructions;

    public function mount()
    {
        $this->trc20Usdt = Trc20USDT::first() ?? new Trc20USDT();
        $this->trc20UsdtAddress = $this->trc20Usdt->trc20_usdt_address ?? 'No Address';
        $this->trc20UsdtInstructions = $this->trc20Usdt->trc20_usdt_instructions ?? 'No Instructions';
    }
    public function saveTrc20UsdtInstructions()
    {
        $trc20Usdt = Trc20USDT::updateOrCreate(
            [],
            [
            'trc20_usdt_address' => $this->trc20UsdtAddress,
            'trc20_usdt_instructions' => $this->trc20UsdtInstructions
            ]);
        session()->flash('message', 'Trc20 USDT Instructions saved successfully.');
        redirect()->route('system-configs');
    }
    public function deleteTrc20UsdtAddress($id)
    {
        TRC20USDT::destroy($id);
        session()->flash('message', 'Trc20 USDT Instructions deleted successfully.');
        redirect()->route('system-configs');
    }
    public function render()
    {
        return view('livewire.system-administration.system-configs', [
            'trc20Usdt' => Trc20USDT::first(),
        ])->layout('layouts.admin');
    }
}
