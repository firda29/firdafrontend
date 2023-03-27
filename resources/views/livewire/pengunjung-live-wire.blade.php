<div>
    <div class="container">
        <div class="row">

    <h1>Tabel Data Pengunjung </h1>
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
                <th scope="col">Nama Pengunjung</th>
                <th scope="col">Email Pengunjung</th>
                <th scope="col">Telepon Pengunjung</th>
                <th scope="col">password</th>
              </tr>

              @foreach ($pengunjung as $row)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $row['nama_pengunjung'] }}</td>
            <td>{{ $row['email_pengunjung'] }}</td>
            <td>{{ $row['telepon_pengunjung'] }}</td>
            <td>{{ $row['password'] }}</td>
            <td>
                <button wire:click.prevent="show({{ $row['id_pengunjung'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                    Edit
                  </button>
                  <button wire:click.prevent="destroy({{ $row['id_pengunjung'] }})" type="button" class="btn btn-primary">
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pengunjung</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Pengunjung</label>
                <input type="text" class="form-control" name="nama_pegunjung" wire:model="nama_pengunjung">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Pengunjung</label>
                <input type="email" class="form-control" name="email_pegunjung" wire:model="email_pengunjung">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telepon Pengunjung</label>
                <input type="namber" class="form-control" name="telepon_pegunjung" wire:model="telepon_pengunjung">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password </label>
                <input type="text" class="form-control" name="password" wire:model="password">
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
    <form wire:submit.prevent="update({{ $id_pengunjung }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pengunjung {{ $id_pengunjung }}</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Pengunjung</label>
            <input type="text" class="form-control" name="nama_pegunjung" wire:model="nama_pengunjung">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email Pengunjung</label>
            <input type="email" class="form-control" name="email_pegunjung" wire:model="email_pengunjung">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telepon Pengunjung</label>
            <input type="namber" class="form-control" name="telepon_pegunjung" wire:model="telepon_pengunjung">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password </label>
            <input type="text" class="form-control" name="password" wire:model="password">
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
