<div>
    <div class="container">
        <div class="row">


    <h1>Tabel Data Iklan </h1>
    @if (session()->has('pesan_delete'))
    <span class="panel-desc" style="color:red;">{{ session('pesan_delete') }}</span>
     @endif


    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
      </button>

        <hr>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Id Users</th>
                <th scope="col">Judul Iklan</th>
                <th scope="col">Ukuran Iklan</th>
                <th scope="col">Posisi Iklan</th>
                <th scope="col">Gambar Iklan</th>
              </tr>

              @foreach ($iklan as $row)
              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $row['id_users'] }}</td>
                  <td>{{ $row['judul_iklan'] }}</td>
                  <td>{{ $row['ukuran_iklan'] }}</td>
                  <td>{{ $row['posisi_iklan'] }}</td>
                  <td>{{ $row['gambar_iklan'] }}</td>
                  <td><img src="http://127.0.0.1:8000/images/{{ $row['gambar_iklan'] }}"height="100" /></td>
                  <td>
                      <button wire:click.prevent="show({{ $row['id_iklan'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                          Edit
                        </button>
                        <button wire:click.prevent="destroy({{ $row['id_iklan'] }})" type="button" class="btn btn-primary">
                          Hapus
                        </button>

                  </td>

              </tr>
              @endforeach
            </table>

        </div>
    </div>


<!-- Modal Tambah -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form wire:submit.prevent="store">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Iklan</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Users</label>
            <input type="text" class="form-control" name="id_users" wire:model="id_users">
          </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Iklan</label>
                <input type="text" class="form-control" name="judul_iklan" wire:model="judul_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ukuran Iklan</label>
                <input type="text" class="form-control" name="ukuran_iklan" wire:model="ukuran_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Posisi Iklan</label>
                <input type="text" class="form-control" name="posisi_iklan" wire:model="posisi_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gambar Iklan </label>
                <input type="file" class="form-control" name="gambar_iklan" wire:model="gambar_iklan">
              </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</form>
  </div>


  <!-- Modal Edit -->
<div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form wire:submit.prevent="update({{ $id_iklan }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Iklan {{ $id_iklan }}</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Users</label>
            <input type="text" class="form-control" name="id_users" wire:model="id_users">
          </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Iklan</label>
                <input type="text" class="form-control" name="judul_iklan" wire:model="judul_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ukuran Iklan</label>
                <input type="text" class="form-control" name="ukuran_iklan" wire:model="ukuran_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Posisi Iklan</label>
                <input type="text" class="form-control" name="posisi_iklan" wire:model="posisi_iklan">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gambar Iklan </label>
                <input type="file" class="form-control" name="gambar_iklan" wire:model="gambar_iklan">
              </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</form>
  </div>



</div>
