<?php

namespace App\Http\Livewire;

use App\Models\Rw;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Kasus;
use Livewire\Component;

class Livewire extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $desa;
    public $rw;
    public $idk;
    public $kasus1;

    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $selectedDesa = null;
    public $selectedRw = null;

    public function mount($selectedRw = null, $idk = null)
    {
        $this->provinsi = Provinsi::all();
        $this->kota = Kota::with('provinsi')->get();
        $this->kecamatan = Kecamatan::whereHas('kota', function ($query) {
            $query->whereId(request()->input('id_kota', 0));
        })->pluck('nama_kecamatan', 'id');
        $this->desa = Desa::whereHas('kecamatan', function ($query) {
            $query->whereId(request()->input('id_kecamatan', 0));
        })->pluck('nama_desa', 'id');
        $this->rw = Rw::whereHas('desa', function ($query) {
            $query->whereId(request()->input('id_desa', 0));
        })->pluck('no_rw', 'id');
        $this->selectedRw = $selectedRw;
        $this->idk = $idk;
        if (!is_null($idk)) {
            $this->kasus1 = Kasus::findOrFail($idk);
        }

        if (!is_null($selectedRw)) {
            $rw = Rw::with('desa.kecamatan.kota.provinsi')->find($selectedRw);
            if ($rw) {
                $this->rw = RW::where('id_desa', $rw->id_desa)->get();
                $this->desa = Desa::where('id_kecamatan', $rw->desa->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->desa->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->desa->kecamatan->kota->id_provinsi)->get();
                $this->selectedProvinsi =$rw->desa->kecamatan->kota->id_provinsi;
                $this->selectedKota = $rw->desa->kecamatan->id_kota;
                $this->selectedKecamatan = $rw->desa->id_kecamatan;
                $this->selectedDesa = $rw->id_desa;
            }
        }
    }

    public function render()
    {
        return view('livewire.livewire');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKota = NULL;
        $this->selectedKecamatan = NULL;
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->desa = Desa::where('id_kecamatan', $kecamatan)->get();
        $this->selectedDesa = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedDesa($desa)
    {
        if (!is_null($desa)) {
            $this->rw = Rw::where('id_desa', $desa)->get();
        }else{
            $this->selectedRw = NULL;
        }
    }

}