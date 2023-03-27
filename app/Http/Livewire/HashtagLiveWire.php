<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class HashtagLiveWire extends Component
{

    public $id_hashtag, $nama_hashtag, $keterangan_hashtag, $created_at, $updated_ed;
    public function render()
    {
        $json = Http::get("http://127.0.0.1:8070/api/hastag/");
        $data = json_decode($json, true);
        $this->hashtag = $data['data'];


        return view('livewire.hashtag-live-wire')
        ->extends('template')
        ->section('content');

    }

    public function ClearForm(){
        $this->nama_hashtag = '';
        $this->keterangan_hashtag = '';

    }

    public function store(){

        $insert = Http::post('http://127.0.0.1:8070/api/hastag/store', [
            'nama_hashtag' => $this->nama_hashtag,
            'keterangan_hashtag' => $this->keterangan_hashtag,
        ]);

        session()->flash('pesan', "Berhasil Menyimpan Data!");
        $this->ClearForm();


    }

    public function show($id){
        $json = Http::get("http://127.0.0.1:8070/api/hastag/show/".$id);
        $decode = json_decode($json, true);


        $this->id_hashtag = $decode['data']['id_hashtag'];
        $this->nama_hashtag = $decode['data']['nama_hashtag'];
        $this->keterangan_hashtag = $decode['data']['keterangan_hashtag'];

    }

    public function update($id){

        $insert = Http::post("http://127.0.0.1:8070/api/hastag/update/".$id, [
            'nama_hashtag' => $this->nama_hashtag,
            'keterangan_hashtag' => $this->keterangan_hashtag,
        ]);

        session()->flash('pesan', "Berhasil Menyimpan Data!");
        $this->ClearForm();
    }

    public function destroy($id){
        $json = Http::get("http://127.0.0.1:8070/api/hastag/destroy/".$id);
        $decode = json_decode($json, true);

        session()->flash('pesan_delete', "Berhasil Menyimpan Data!");


}
}

