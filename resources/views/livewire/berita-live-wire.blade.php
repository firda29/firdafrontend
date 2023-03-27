<div>
    <div class="container">
        <div class="row">


    <h1>Tabel Data Berita </h1>
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
                <th scope="col">Id Sub Kategori</th>
                <th scope="col">Id Users</th>
                <th scope="col">Judul Berita</th>
                <th scope="col">Sub Judul Berita</th>
                <th scope="col">Short Desc Berita</th>
                <th scope="col">Isi Berita</th>
                <th scope="col">Lokasi Berita</th>
                <th scope="col">Jumlah Berita Dibaca</th>
                <th scope="col">Foto Berita</th>
              </tr>

              @foreach ($berita as $row)

              <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $row['nama_sub_kategori'] }}</td>
                  <td>{{ $row['nama'] }}</td>
                  <td>{{ $row['judul_berita'] }}</td>
                  <td>{{ $row['sub_judul_berita'] }}</td>
                  <td>{{ $row['short_desc_berita'] }}</td>
                  <td>{{ $row['isi_berita'] }}</td>
                  <td>{{ $row['foto_berita'] }}</td>
                  <td>{{ $row['lokasi_berita'] }}</td>
                  <td>{{ $row['jumlah_berita_dibaca'] }}</td>
                  <td><img src="http://127.0.0.1:8000/images/{{ $row['foto_berita'] }}"height="100" /></td>
                  <td>
                      <button wire:click.prevent="show({{ $row['id_berita'] }})" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit">
                          Edit
                        </button>
                        <button wire:click.prevent="destroy({{ $row['id_berita'] }})" type="button" class="btn btn-primary">
                          Hapus
                        </button>

                  </td>

              </tr>
              @endforeach
            </table>

            </thead>
            <tbody>


<!-- Modal Tambah -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form wire:submit.prevent="store">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Berita</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Sub Kategori</label>
            <select type="text" class="form-control" name="id_sub_kategori" wire:model="id_sub_kategori">
            <option>Pilihan Sub Kategori</option>
            @foreach ($sub_kategori as $row )
            <option value="{{ $row['id_sub_kategori'] }}">{{ $row['nama_sub_kategori'] }}</option>

            @endforeach
            </select>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Users </label>
            <select type="text" class="form-control" name="id_users" wire:model="id_users">
                <option>Pilihan Sub Kategori</option>
                @foreach ($users as $row )
                <option value="{{ $row['id_users'] }}">{{ $row['nama'] }} - {{ $row['level_users'] }}</option>

                @endforeach
                </select>

          </div>

          <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" name="judul_berita" wire:model="judul_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sub Judul Berita</label>
                <input type="text" class="form-control" name="sub_judul_berita" wire:model="sub_judul_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Short Desc Berita</label>
                <input type="text" class="form-control" name="short_desc_berita" wire:model="short_desc_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Isi Berita </label>
                <input type="text" class="form-control" name="isi_berita" wire:model="isi_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Foto Berita </label>
                <input type="file" class="form-control" name="foto_berita" wire:model="foto_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Lokasi Berita </label>
                <input type="text" class="form-control" name="lokasi_berita" wire:model="lokasi_berita">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah Berita Dibaca </label>
                <input type="text" class="form-control" name="jumlah_berita_dibaca" wire:model="jumlah_berita_dibaca">
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
    <form wire:submit.prevent="update({{ $id_berita }})">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Berita {{ $id_berita }}</h1>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('pesan'))
            <span class="panel-desc" style="color:green;">{{ session('pesan') }}</span>
          @endif
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Sub Kategori</label>
            <select type="text" class="form-control" name="id_sub_kategori" wire:model="id_sub_kategori">
            <option>Pilihan Sub Kategori</option>
            @foreach ($sub_kategori as $row )
            <option value="{{ $row['id_sub_kategori'] }}">{{ $row['nama_sub_kategori'] }}</option>

            @endforeach
            </select>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Id Users </label>
            <select type="text" class="form-control" name="id_users" wire:model="id_users">
                <option>Pilihan Sub Kategori</option>
                @foreach ($users as $row )
                <option value="{{ $row['id_users'] }}">{{ $row['nama'] }} - {{ $row['level_users'] }}</option>

                @endforeach
                </select>

          </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul_berita" wire:model="judul_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sub Judul Berita</label>
            <input type="text" class="form-control" name="sub_judul_berita" wire:model="sub_judul_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Short Desc Berita</label>
            <input type="text" class="form-control" name="short_desc_berita" wire:model="short_desc_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Isi Berita </label>
            <input type="text" class="form-control" name="isi_berita" wire:model="isi_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Foto Berita </label>
            <input type="file" class="form-control" name="foto_berita" wire:model="foto_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Lokasi Berita </label>
            <input type="text" class="form-control" name="lokasi_berita" wire:model="lokasi_berita">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Berita Dibaca </label>
            <input type="text" class="form-control" name="jumlah_berita_dibaca" wire:model="jumlah_berita_dibaca">
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

