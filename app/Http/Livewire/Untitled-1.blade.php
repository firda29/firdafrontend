                            <td scope="col">{{ $loop->index + 1 }}</td>
                            <td scope="col">{{ $row['nama_kategori'] }}</td>
                            <td scope="col">{{ $row['keterangan_kategori'] }}</td>
                            <td scope="col">
                                <button wire:click.prevent="show({{$row['id_kategori'] }})"
                                    type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#edit">
                                    Edit
                                </button>
                                <button type="button" wire:click.prevent="destroy({{ $row['id_kategori'] }})"
                                    class="btn btn-primary">
                                    Hapus
                                </button>


                            </td>