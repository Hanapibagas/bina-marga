@extends('layouts.app')

@section('content')
    @push('css')
        <style>
            .overlay {
                position: absolute;
                top: 0;
                left: 0;
                z-index: 999;
                width: 100vw;
                height: 100vh;
                background-color: #000;
                opacity: 0.5;
            }

            .announcement {
                position: absolute;
                top: 50%;
                /* Pusatkan vertikal */
                left: 50%;
                /* Pusatkan horizontal */
                transform: translate(-50%, -50%);
                /* Pusatkan elemen ke tengah */
                z-index: 1000;
                /* Beri z-index yang lebih tinggi dari overlay jika perlu */
                width: 60vw;
                height: max-content;
                padding: 10px;
                border-radius: 10px
            }

            .announcement .title {
                font-size: 30px;
            }

            .announcement .badge {
                font-size: 12px;
            }

            .announcement .card-body {
                position: relative;
                height: fit-content;
            }

            .owl-stage-outer {
                height: fit-content;
                overflow: hidden;
            }

            .owl-stage {
                display: flex;
                flex-direction: row;
                overflow: hidden;
            }
            .owl-nav {
                display: none
            }
            .close {
                position: absolute;
                top: 10px;
                right: 10px;
            }
        </style>
    @endpush

    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('status') }}",
            });
        </script>
    @endif

    <div class="overlay">
        <div class="announcement card">
            <div class="card-body">
                <button  class="close">X</button>
                <div class="owl-carouselss owl-theme">
                    <div class="item">
                        <div class="title">Pengumuman penting <span class="badge badge-secondary"> Selasa, 19 September
                                2023</span></div>
                        <div class="desc">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius consequuntur dolorum eum fuga
                            saepe quia quam eos, veniam id mollitia eligendi assumenda a numquam accusantium nostrum
                            blanditiis atque dignissimos magni!
                            Dolorem nostrum accusamus magnam nisi. Quia, ipsam odit aliquid unde similique quam repellat
                            corrupti expedita nesciunt laboriosam veritatis, cum reiciendis nulla dolorem fugiat laudantium
                            suscipit. Eaque veniam minus eligendi quisquam.
                            Quod facilis laborum aspernatur blanditiis et sed molestias perspiciatis dignissimos velit
                            repellat neque praesentium, ex ut maiores ipsam eius debitis laudantium dolores nihil hic id
                            consequatur rerum quidem? Earum, architecto?
                            Nam consequuntur explicabo dolorum eveniet deleniti amet voluptatum earum architecto commodi
                            temporibus, incidunt, aliquam at placeat recusandae ab eos quia ut, esse quaerat ipsa facilis.
                            Vel impedit tempore aspernatur magnam!
                            Eius debitis id hic repellat iusto repudiandae laudantium quam dignissimos, ratione iure eveniet
                            illo rerum necessitatibus at. Corporis architecto deserunt tempore earum, perspiciatis
                            voluptatibus alias eos dolore praesentium, ipsum debitis?
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">Pengumuman penting 2<span class="badge badge-secondary"> Selasa, 19 September
                                2023</span></div>
                        <div class="desc">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius consequuntur dolorum eum fuga
                            saepe quia quam eos, veniam id mollitia eligendi assumenda a numquam accusantium nostrum
                            blanditiis atque dignissimos magni!
                            Dolorem nostrum accusamus magnam nisi. Quia, ipsam odit aliquid unde similique quam repellat
                            corrupti expedita nesciunt laboriosam veritatis, cum reiciendis nulla dolorem fugiat laudantium
                            suscipit. Eaque veniam minus eligendi quisquam.
                            Quod facilis laborum aspernatur blanditiis et sed molestias perspiciatis dignissimos velit
                            repellat neque praesentium, ex ut maiores ipsam eius debitis laudantium dolores nihil hic id
                            consequatur rerum quidem? Earum, architecto?
                            Nam consequuntur explicabo dolorum eveniet deleniti amet voluptatum earum architecto commodi
                            temporibus, incidunt, aliquam at placeat recusandae ab eos quia ut, esse quaerat ipsa facilis.
                            Vel impedit tempore aspernatur magnam!
                            Eius debitis id hic repellat iusto repudiandae laudantium quam dignissimos, ratione iure eveniet
                            illo rerum necessitatibus at. Corporis architecto deserunt tempore earum, perspiciatis
                            voluptatibus alias eos dolore praesentium, ipsum debitis?
                        </div>
                    </div>
                    <div class="item">
                        <div class="title">Pengumuman penting 3<span class="badge badge-secondary"> Selasa, 19 September
                                2023</span></div>
                        <div class="desc">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius consequuntur dolorum eum fuga
                            saepe quia quam eos, veniam id mollitia eligendi assumenda a numquam accusantium nostrum
                            blanditiis atque dignissimos magni!
                            Dolorem nostrum accusamus magnam nisi. Quia, ipsam odit aliquid unde similique quam repellat
                            corrupti expedita nesciunt laboriosam veritatis, cum reiciendis nulla dolorem fugiat laudantium
                            suscipit. Eaque veniam minus eligendi quisquam.
                            Quod facilis laborum aspernatur blanditiis et sed molestias perspiciatis dignissimos velit
                            repellat neque praesentium, ex ut maiores ipsam eius debitis laudantium dolores nihil hic id
                            consequatur rerum quidem? Earum, architecto?
                            Nam consequuntur explicabo dolorum eveniet deleniti amet voluptatum earum architecto commodi
                            temporibus, incidunt, aliquam at placeat recusandae ab eos quia ut, esse quaerat ipsa facilis.
                            Vel impedit tempore aspernatur magnam!
                            Eius debitis id hic repellat iusto repudiandae laudantium quam dignissimos, ratione iure eveniet
                            illo rerum necessitatibus at. Corporis architecto deserunt tempore earum, perspiciatis
                            voluptatibus alias eos dolore praesentium, ipsum debitis?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Daftar Data Center</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                    <i style="font-size: 30px; margin-right: 30px;" class="ri-add-line"></i>
                                </span>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton5">
                                    <a style="margin-top: 10px;" class="dropdown-item" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <i style="font-size: 25px; " class="ri-folders-fill"></i>Folder
                                        Baru +
                                    </a>
                                    <hr>
                                    <a style="margin-bottom: 10px;" class="dropdown-item" data-toggle="modal"
                                        data-target="#exampleModalCenterFile"><i style="font-size: 25px;"
                                            class="ri-file-fill"></i>File Baru +</a>
                                    {{--
                                <hr> --}}
                                    {{-- <a style="margin-bottom: 10px;" class="dropdown-item" data-toggle="modal"
                                    data-target="#exampleModalCenterUser"><i style="font-size: 25px;"
                                        class="ri-user-fill"></i>Pengguna Baru +</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pengguna</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $filesWithoutFolder = [];
                                        $filesWithFolder = [];
                                        
                                        foreach ($data as $datas) {
                                            if (strpos($datas->folder_name, 'folder-file/') === 0) {
                                                $filesWithFolder[] = $datas;
                                            } else {
                                                $filesWithoutFolder[] = $datas;
                                            }
                                        }
                                    @endphp

                                    @foreach ($filesWithoutFolder as $key => $datas)
                                        <tr>
                                            <td>
                                                <a href="{{ route('get.Details', $datas->id) }}">
                                                    <i style="font-size: 30px;"
                                                        class="ri-folders-fill"></i>{{ $datas->folder_name }}
                                                </a>
                                            </td>
                                            <td>{{ $datas->Users->name }}</td>
                                            <td>{{ date('d F Y', strtotime($datas->tanggal)) }}</td>
                                            <td>
                                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle text-primary" id="dropdownMenuButton5"
                                                            data-toggle="dropdown">
                                                            <i style="margin-left: 30px;" class="ri-more-2-fill"></i>
                                                        </span>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenuButton5">
                                                            <a class="dropdown-item" data-toggle="modal"
                                                                data-target="#editModal{{ $datas->id }}"><i
                                                                    style="font-size: 25px;"
                                                                    class="ri-pencil-fill mr-2"></i>Edit</a>
                                                            <hr>
                                                            <form action="{{ route('put.Update.Status', $datas->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"><i
                                                                        style="font-size: 25px;"
                                                                        class="ri-delete-bin-6-fill mr-2"></i>Pindahkan ke
                                                                    sampah</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editModal{{ $datas->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Nama Folder
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('put.Nama.Folder', $datas->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="text" name="folder_name"
                                                                    class="form-control" value="{{ $datas->folder_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ubah
                                                                Nama</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @foreach ($filesWithFolder as $key => $datas)
                                        <tr>
                                            <td>
                                                <a href="{{ route('get.Details', $datas->id) }}">
                                                    <i style="font-size: 30px;" class="ri-file-fill"></i>
                                                    {{ substr($datas->folder_name, 12) }}
                                                </a>
                                            </td>
                                            <td>{{ $datas->Users->name }}</td>
                                            <td>{{ date('d F Y', strtotime($datas->tanggal)) }}</td>
                                            <td>
                                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                                    <div class="dropdown">
                                                        <span class="dropdown-toggle text-primary"
                                                            id="dropdownMenuButton5" data-toggle="dropdown">
                                                            <i style="margin-left: 30px;" class="ri-more-2-fill"></i>
                                                        </span>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                            aria-labelledby="dropdownMenuButton5">
                                                            <form action="{{ route('put.Update.Status', $datas->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"><i
                                                                        style="font-size: 25px;"
                                                                        class="ri-delete-bin-6-fill mr-2"></i>Pindahkan ke
                                                                    sampah</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
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

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Folder Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('post.Folder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="folder_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Silahkan buat folder">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenterFile" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('post.File') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="folder_name" class="form-control-file" id="fileInput"
                                aria-describedby="fileHelp"><br>
                            <div id="previewContainer"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat</button>
                    </div>
                </form>
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
                                <input type="email" name="email" id="userEmail" class="form-control" value=""
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="Email">Jabatan</label>
                                <input type="text" name="roles" id="userRoles" class="form-control" value=""
                                    readonly>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let announcement = document.querySelector(".announcement");
            let overlay = document.querySelector(".overlay");
            let closeButton = document.querySelector(".close");
            
            if (announcement) {
                document.body.appendChild(overlay);
                document.body.appendChild(announcement);
            }

            closeButton.addEventListener('click', function() {
                overlay.remove();
                announcement.remove();
            })
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carouselss').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endpush
