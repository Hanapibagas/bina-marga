@extends('layouts.app')

@section('content')

@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text : "{{ session('status') }}",
    });
</script>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Daftar Pengguna</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <div class="dropdown">
                            <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                <i style="font-size: 30px; margin-right: 30px;" class="ri-add-line"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                {{-- <a style="margin-top: 10px;" class="dropdown-item" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <i style="font-size: 25px; " class="ri-folders-fill"></i>Folder
                                    Baru +
                                </a>
                                <hr>
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenterFile"><i
                                        style="font-size: 25px;" class="ri-file-fill"></i>File Baru +</a>
                                <hr> --}}
                                <a style="margin-bottom: 10px; margin-top: 10px;" class="dropdown-item"
                                    data-toggle="modal" data-target="#exampleModalCenterUser"><i
                                        style="font-size: 25px;" class="ri-user-fill"></i>Pengguna Baru +</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $pengguna as $penggunas )
                                <tr>
                                    <td>{{ $penggunas->name }}</td>
                                    <td>{{ $penggunas->email }}</td>
                                    <td>{{ $penggunas->roles }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenterUser" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('get.Tambah.Pengguna') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Pengguna">Pengguna</label>
                        <select id="userRole" name="name" class="form-control" required>
                            <option value="-- Silahkan Pilih --">-- Silahkan Pilih --</option>
                            <option value="Admin bidang/upt">Admin bidang/upt</option>
                            <option value="Admin seksi">Admin seksi</option>
                            <option value="Admin staff">Admin staff</option>
                        </select>
                    </div>
                    <div id="additionalFields" style="display: none;">
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" id="userEmail" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Email">Jabatan</label>
                            <input type="text" name="roles" id="userRoles" class="form-control" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Password">Password</label>
                            <input name="password" id="userPassword" class="form-control" value="12345678" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    const userRoleSelect = document.getElementById('userRole');
    const additionalFieldsDiv = document.getElementById('additionalFields');
    const userEmailInput = document.getElementById('userEmail');
    const userRolesInput = document.getElementById('userRoles');
    const userPasswordInput = document.getElementById('userPassword');

    userRoleSelect.addEventListener('change', function() {
        if (userRoleSelect.value === 'Admin bidang/upt') {
            additionalFieldsDiv.style.display = 'block';
            userEmailInput.value = 'bidang/upt@gmail.com';
            userRolesInput.value = 'bidang_upt';
            userPasswordInput.value = '12345678';
        } else if (userRoleSelect.value === 'Admin seksi') {
            additionalFieldsDiv.style.display = 'block';
            userEmailInput.value = 'seksi@gmail.com';
            userRolesInput.value = 'seksi';
            userPasswordInput.value = '12345678';
        } else if (userRoleSelect.value === 'Admin staff') {
            additionalFieldsDiv.style.display = 'block';
            userEmailInput.value = 'staff@gmail.com';
            userRolesInput.value = 'staff';
            userPasswordInput.value = '12345678';
        } else {
            additionalFieldsDiv.style.display = 'none';
        }
    });
</script>
<script>
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');

    fileInput.addEventListener('change', function() {
        previewContainer.innerHTML = '';

        const files = fileInput.files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const preview = document.createElement('img');
                preview.src = e.target.result;
                preview.style.maxWidth = '100%';
                preview.style.height = 'auto';
                previewContainer.appendChild(preview);
            }

            reader.readAsDataURL(file);
        }
    });
</script>
<script>
    const chatIcon = document.getElementById('chat-icon');
    const notificationsDropdown = document.getElementById('notifications-dropdown');

    chatIcon.addEventListener('click', () => {
        notificationsDropdown.classList.toggle('show-dropdown');
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
@endpush