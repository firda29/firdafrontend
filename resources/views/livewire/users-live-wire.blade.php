<div>
    <div class="container">
        <div class="row">

    <h1>Tabel Data Users </h1>
    @if (session()->has('pesan_delete'))
    <span class="panel-desc" style="color:red;">{{ session('pesan_delete') }}</span>
     @endif

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
      </button>

        <hr>
        <table class="table">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama </th>
                <th scope="col">Telepon</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Level Users</th>
                <th scope="col">Foto Users</th>
              </tr>

              @foreach ($users as $row)
              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $row['nama'] }}</td>
                  <td>{{ $row['telepon'] }}</td>
                  <td>{{ $row['email'] }}</td>
                  <td>{{ $row['password'] }}</td>
                  <td>{{ $row['foto_users'] }}</td>
                  <td>{{ $row['level_users'] }}</td>
                  <td><img src="http://127.0.0.1:8000/images/{{ $row['foto_users'] }}"height="100" /></td>
                  <td>
                      <button wire:click.prevent="show({{ $row['id_users'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                          Edit
                        </button>
                        <button wire:click.prevent="destroy({{ $row['id_users'] }})" type="button" class="btn btn-primary">
                          Hapus
                        </button>
                  </td>
              </tr>
              @endforeach
            </table>

        </div>
    </div>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form wire:submit.prevent="store">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Users</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif

            <div class="mb-3">
                <label for="form-label">Nama</label>
                <input type="text" nama="nama" class="form-control" wire:model="nama">
              </div>

              <div class="mb-3">
                  <label for="form-label">Telepon</label>
                  <input type="text" nama="telepon" class="form-control" wire:model="telepon">
                </div>

                <div class="mb-3">
                  <label for="form-label">Email</label>
                  <input type="text" nama="email" class="form-control" wire:model="email">
                </div>

                <div class="mb-3">
                  <label for="form-label">Password</label>
                  <input type="text" nama="password" class="form-control" wire:model="password">
                </div>

                <div class="mb-3">
                  <label for="form-label">Foto Users</label>
                  <input type="file" nama="foto_users" class="form-control" wire:model="foto_users">
                </div>

                <div class="mb-3">
                  <label for="form-label">Level Users</label>
                  <input type="text" nama="level_users" class="form-control" wire:model="level_users">
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
    <form wire:submit.prevent="update({{ $id_users }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Users {{ $id_users}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif

          <div class="mb-3">
            <label for="form-label">Nama</label>
            <input type="text" nama="nama" class="form-control" wire:model="nama">
          </div>

          <div class="mb-3">
              <label for="form-label">Telepon</label>
              <input type="text" nama="telepon" class="form-control" wire:model="telepon">
            </div>

            <div class="mb-3">
              <label for="form-label">Email</label>
              <input type="text" nama="email" class="form-control" wire:model="email">
            </div>

            <div class="mb-3">
              <label for="form-label">Password</label>
              <input type="text" nama="password" class="form-control" wire:model="password">
            </div>

            <div class="mb-3">
              <label for="form-label">Foto Users</label>
              <input type="file" nama="foto_users" class="form-control" wire:model="foto_users">
            </div>

            <div class="mb-3">
              <label for="form-label">Level Users</label>
              <input type="text" nama="level_users" class="form-control" wire:model="level_users">
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
</div>
