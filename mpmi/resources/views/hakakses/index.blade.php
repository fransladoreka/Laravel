@extends('layoutes.main')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
<style>
    /* Perbesar container icon */
    /* .jstree-default .jstree-themeicon {
        width: 18px !important;
        height: 18px !important;
        line-height: 18px !important;
        vertical-align: middle !important;
    } */

    /* Perbesar ukuran font icon */
    /* .jstree-default .jstree-themeicon i {
        font-size: 18px !important;
    } */

    /* .jstree-default .jstree-checkbox {
        transform: scale(1.2);
        margin-right: 4px;
        width: 18px !important;
        height: 18px !important;
    } */

    /* Perbesar container checkbox */
    /* .jstree-default .jstree-checkbox {
        width: 20px !important;
        height: 20px !important;
    } */

    /* Sesuaikan ukuran klik area */
    /* .jstree-default .jstree-checkbox:before {
        width: 20px !important;
        height: 20px !important;
    } */
    /* =========================
   ROW TREE
========================= */
    .jstree-default .jstree-anchor {
        height: 24px !important;
        line-height: 24px !important;
        padding: 0 4px !important;
        font-size: 14px;
        /* teks normal */
        display: inline-flex;
        align-items: center;
        /* teks, icon, checkbox sejajar */
    }

    /* =========================
   CHECKBOX PROPORSIONAL
========================= */
    .jstree-default .jstree-checkbox {
        transform: scale(0.9);
        /* skala kecil supaya tidak dominan */
        transform-origin: center;
        margin-right: 4px;
        /* jarak ke icon */
    }

    /* =========================
   ICON FOLDER PROPORSIONAL
========================= */
    .jstree-default .jstree-themeicon {
        width: 16px !important;
        /* container icon */
        height: 16px !important;
        line-height: 16px !important;
        text-align: center !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin-right: 4px;
        /* jarak ke teks */
    }

    .jstree-default .jstree-themeicon i {
        font-size: 16px !important;
        vertical-align: middle;
    }

    /* =========================
   Teks tetap sejajar
========================= */
    .jstree-default .jstree-anchor .jstree-themeleaf {
        vertical-align: middle;
    }


    /* Menghapus segitiga default */
    /* .jstree-default .jstree-ocl {
        background-image: none !important;
    } */

    /* Mengganti dengan ikon kotak (+) dan (-) menggunakan CSS pseudo-element */
    /* .jstree-default .jstree-closed>.jstree-ocl::before {
        content: "\229E";
    } */

    /* .jstree-default .jstree-open>.jstree-ocl::before {
        content: "\229F";
    } */

    /* Mengganti ikon daun (leaf node) agar seragam jika diperlukan */
    /* .jstree-default .jstree-leaf>.jstree-ocl::before {
        content: "\25FB";
    } */
</style>
@endpush
@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="modal fade" id="modalForm">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Data</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form id="formHakAkses" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="_method" id="method">

                    <div class="modal-body">

                        <div class="mb-3">
                            <label>Kode</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea name="description" rows="3" id="description" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="far fa-window-close"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="far fa-save"></i>Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <div class="row table_data">
        <div class="col-12 col-md-5 mb-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Bagian kiri: Icon + Judul -->
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-table text-primary"></i>
                        <h4 class="mb-0">Hak Akses</h4>
                    </div>

                    <!-- Bagian kanan: Tombol -->
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="createData()">
                            <i class="fas fa-file-medical"></i> Tambah Baru
                        </button>
                        <button class="btn btn-outline-warning btn-sm" onclick="onRefresh()">
                            <i class="fas fa-refresh"></i> Refresh
                        </button>
                    </div>
                </div>
                <div class="card-body" style="min-height: 350px;">
                    <!-- Tombol toggle tree -->
                    <!-- <button class="btn btn-outline-secondary btn-sm" type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#treeContainer"
                        aria-expanded="false"
                        aria-controls="treeContainer">
                        Tampilkan Tree
                    </button> -->
                    <!-- <button class="btn btn-outline-secondary btn-sm" type="button"
                        id="treeToggleBtn">
                        Tampilkan Tree
                    </button> -->
                    <!-- <div style="overflow-x: auto;"> -->
                    <div class="card-table-container">
                        <table id="tableHakAkses" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $key => $role)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $role->kode }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-circle btn-icon"
                                                onclick="showPermission('{{ $role->id }}')"><i class="fas fa-arrow-right"></i></button>
                                            <div class="dropdown">
                                                <button class="dropdownBtn btn btn-sm btn-outline-info btn-circle btn-icon" type="button">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <div class="dropdownMenu dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:;" onclick="editData('{{ $role->id }}')">
                                                        <i class="fa fa-pen"></i> Ubah
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="javascript:;" onclick="onDelete('{{ $role->id }}')">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <div class="dropdown dropdown-inline">
                                                <a href="javascript:;"
                                                    class="btn btn-sm btn-outline-info btn-circle btn-icon"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa fa-cog"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm">
                                                    <ul class="nav nav-hoverable flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link text-hover-warning"
                                                                href="javascript:;"
                                                                data-bs-toggle="tooltip"
                                                                title="Lihat Menu Data"
                                                                onclick="editData('{{ $role->id }}')">

                                                                <i class="nav-icon fa fa-pen"></i>
                                                                <span class="nav-text text-hover-warning">Ubah</span>
                                                            </a>
                                                        </li>

                                                        <li class="nav-item">
                                                            <a class="nav-link text-hover-danger"
                                                                href="javascript:;"
                                                                onclick="onDelete('{{ $role->id }}')">

                                                                <i class="nav-icon fa fa-trash"></i>
                                                                <span class="nav-text text-hover-danger">Hapus</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
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
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <!-- Bagian kiri: Icon + Judul -->
                    <div class="d-flex align-items-center gap-2">
                        <i class="fas fa-clipboard-list text-primary"></i>
                        <h4 class="mb-0">Menu Data</h4>
                    </div>
                    <!-- Bagian kanan: Tombol -->
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm" onclick="SimpanPermission()"
                            id="tombolSimpanPermission" style="display: none; position: relative;">
                            <span class="btn-text"><i class="fas fa-save"></i> Simpan</span>
                            <span class="btn-spinner"></span>
                        </button>
                    </div>
                </div>
                <!-- Collapse container -->
                <div class="collapse col-12" style="overflow-y: auto;max-height:350px" id="treeContainer">
                    <div class="card-body">
                        <div id="tree"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<!-- <script>
    $('#tree').jstree({
        'core': {
            'data': {
                'url': '/hakakses/permission',
                'dataType': 'json'
            },
            'multiple': true,
            'themes': {
                dots: false,
            }
        },
        'types': {
            'default': {
                'icon': 'fas fa-folder text-warning' // sebelum expand
            },
            'open': {
                'icon': 'fas fa-folder-open text-warning' // saat expand
            }
        },
        'checkbox': {
            'keep_selected_style': false,
            'three_state': true, // parent-child auto logic
            'cascade': 'up+down'
        },
        'plugins': ['checkbox', 'types']
    });
    // .on('ready.jstree', function() {
    //     // Merubah segitiga tertutup
    //     $('.jstree-closed > .jstree-ocl').addClass('fas fa-plus-square-o').removeClass('jstree-ocl');
    //     // Merubah segitiga terbuka
    //     $('.jstree-open > .jstree-ocl').addClass('fas fa-minus-square-o').removeClass('jstree-ocl');
    // });
    // Saat node dibuka
    $('#tree')
        .on('open_node.jstree', function(e, data) {
            data.instance.set_type(data.node, 'open');
        })
        .on('close_node.jstree', function(e, data) {
            data.instance.set_type(data.node, 'default');
        });
</script> -->
@endsection
