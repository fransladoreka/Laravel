@extends('layoutes.main')

@push('styles')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
    .card-custom {
        border: 0;
        border-radius: 10px;
    }

    .section-title {
        font-weight: 600;
        font-size: 14px;
        border-bottom: 1px solid #e5e7eb;
        padding-bottom: 8px;
        margin-bottom: 15px;
    }

    .required {
        color: #dc3545;
    }


    /* ================= DOKUMEN BOX ================= */

    .file-upload-row {
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 12px;
        margin-bottom: 12px;
        background: #fff;
    }

    .file-upload-row small {
        font-size: 9px !important;
        color: #6c757d;
    }

    .table thead th {
        font-size: 12px;
        background: #f1f3f5;
        text-transform: uppercase;
    }

    .btn-back {
        border: 1px solid #dc3545;
        color: #dc3545;
    }

    .btn-back:hover {
        background: #dc3545;
        color: #fff;
    }

    .input-hidden {
        /* Hide the actual input element */
        display: none;
    }

    .input-label {
        /* Style your custom "placeholder" button */
        display: inline-block;
        padding: 10px 15px;
        cursor: pointer;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        /* Add other styling as needed */
    }

    /* Divider Tengah */
    .divider-vertical {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }

    /* Row */
    .upload-row {
        display: flex;
        justify-content: space-between;
        /* align-items: center; */
        align-items: flex-start;
        margin-bottom: 36px;
        flex-wrap: wrap;
    }

    /* Info Kiri */
    .upload-info {
        width: 48%;
    }

    .upload-title {
        font-weight: 600;
        font-size: 14px;
        color: #344054;
    }

    .upload-format {
        font-size: 11px;
        color: #98a2b3;
        margin-top: 4px;
    }

    /* Upload Box */
    .upload-box {
        position: relative;
        display: flex;
        width: 48%;
        height: 42px;
        border: 1px solid #d0d5dd;
        border-radius: 8px;
        overflow: hidden;
        background: #f9fafb;
        transition: all .2s ease;
    }

    /* Kiri */
    .upload-left {
        flex: 1;
        display: flex;
        align-items: center;
        padding: 0 14px;
        font-size: 13px;
        color: #667085;
        gap: 8px;
    }

    /* Kanan */
    .upload-right {
        display: flex;
        align-items: center;
        padding: 0 22px;
        font-size: 13px;
        background: #eef2f6;
        border-left: 1px solid #d0d5dd;
        color: #344054;
        font-weight: 500;
    }

    .upload-right-wrapper {
        display: flex;
        flex-direction: column;
        /* supaya error turun */
    }


    /* Hover effect */
    .upload-box:hover {
        border-color: #3b82f6;
        background: #f1f5ff;
    }

    /* Hidden input */
    .upload-box input {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
    }

    .upload-box.is-invalid {
        border: 1px solid #dc3545;
        background: #fff5f5;
    }

    .file-error {
        font-size: 12px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <div class="card shadow-sm">
        <!-- <div class="card-body d-flex flex-column" style="height: calc(100vh - 190px);"> -->
        <div class="card-body d-flex flex-column">

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0 fw-semibold">Form Pegawai Migran</h5>
                <div>
                    <button class="btn btn-outline-danger btn-sm me-2">Kembali</button>
                    <button class="btn btn-primary btn-sm" type="submit"
                        form="formDataMigran"
                        id="btnSimpan">Simpan</button>
                </div>
            </div>

            <!-- FORM -->
            <form class="d-flex flex-column flex-grow-1"
                id="formDataMigran"
                action="{{ route('datamigran.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- ROW ATAS -->
                <!-- <div class="row flex-grow-1 overflow-hidden"> -->
                <div class="row flex-grow-1">

                    <!-- ================= LEFT (SCROLL AKTIF) ================= -->
                    <div class="col-lg-6 d-flex flex-column">

                        <!-- <div class="flex-grow-1 overflow-auto pe-3"> -->
                        <div style="height: calc(215vh); overflow-y:auto; padding-right:15px;">

                            <h6 class="fw-semibold border-bottom pb-2 mb-3">Biodata</h6>

                            <div class="mb-3">
                                <label class="form-label">Nama <span style="color: red;">*</span></label>
                                <input type="text" name="nama" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">NIK <span style="color: red;">*</span></label>
                                <input type="text" name="nik" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No Passport</label>
                                <input type="text" name="no_passport" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Mulai Passport</label>
                                    <input type="date" name="tgl_mulai_passport" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Berakhir Passport</label>
                                    <input type="date" name="tgl_berakhir_passport" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender"
                                        value="Laki Laki">
                                    <label class="form-check-label">Laki Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="gender"
                                        value="Perempuan">
                                    <label class="form-check-label">Perempuan</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Lahir <span style="color: red;">*</span></label>
                                    <input type="date" name="tgl_lahir" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tempat Lahir <span style="color: red;">*</span></label>
                                    <input type="text" name="tempat_lahir" class="form-control">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Agama <span style="color: red;">*</span></label>
                                <select name="agama" class="form-select">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Provinsi <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="provinsi"
                                        value="Jawa">
                                    <label class="form-check-label">Jawa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="provinsi"
                                        value="Luar Jawa">
                                    <label class="form-check-label">Luar Jawa</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ex Taiwan <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="ex_taiwan"
                                        value="true">
                                    <label class="form-check-label">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="ex_taiwan"
                                        value="false">
                                    <label class="form-check-label">Tidak</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Paket <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="paket"
                                        value="Formal">
                                    <label class="form-check-label">Formal</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="paket"
                                        value="Informal">
                                    <label class="form-check-label">Informal</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Paket Kerja <span style="color: red;">*</span></label>
                                <select name="paket_kerja" class="form-select">
                                    <option>- Pilih Jenis Paket Terlebih Dahulu -</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Glasses <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="glasses"
                                        value="true">
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="glasses"
                                        value="false">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Medical <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="medical"
                                        value="true">
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="medical"
                                        value="false">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Call Visa <span style="color: red;">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="call_visa"
                                        value="true">
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="call_visa"
                                        value="false">
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <h6 class="fw-semibold border-bottom pb-2 mt-4 mb-3">Data Alamat</h6>

                            <div class="mb-3">
                                <label class="form-label">No Telp <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="no_telpon">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat <span style="color: red;">*</span></label>
                                <textarea class="form-control" rows="3" name="alamat"></textarea>
                            </div>

                            <h6 class="fw-semibold border-bottom pb-2 mt-4 mb-3">Kontak Darurat</h6>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Kontak Darurat <span style="color: red;">*</span></label>
                                    <input type="text" name="nama_kontak_darurat" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Kontak Darurat <span style="color: red;">*</span></label>
                                    <input type="text" name="nomor_kontak_darurat" class="form-control">
                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- ================= RIGHT COLUMN ================= -->
                    <div class="col-lg-6 position-relative ps-5">


                        <div class="section-title fw-semibold">Dokumen</div>
                        @php
                        $documents = [
                        'Dokumen KTP',
                        'Dokumen KK',
                        'Dokumen Akta Kelahiran',
                        'Dokumen Ijazah Terakhir',
                        'Dokumen Pernikahan/Perceraian',
                        'Passport',
                        'Pas Foto',
                        'Surat Vaksin 1',
                        'Surat Vaksin 2',
                        'Surat Vaksin 3',
                        'Dokumen SAW',
                        'Dokumen SIK',
                        'BPJS Pra',
                        'BPJS purna',
                        'Data Wali'
                        ];
                        @endphp

                        @foreach($documents as $doc)
                        <div class="upload-row">

                            <div class="upload-info">
                                <div class="upload-title">
                                    {{ $doc }}
                                    @if ($doc == 'Pas Foto')
                                    <span style="color: red;">*</span>
                                    @endif
                                </div>
                                <div class="upload-format">
                                    @if($doc == 'Dokumen Pernikahan/Perceraian')
                                    *Apabila sudah menikah<br>*Format dalam bentuk<br>PDF,JPEG,PNG,JPG
                                    @elseif($doc == 'Pas Foto')
                                    *Format dalam bentuk<br>JPEG,PNG,JPG
                                    @else
                                    *Format dalam bentuk<br>PDF,JPEG,PNG,JPG
                                    @endif
                                </div>
                            </div>

                            <div class="upload-box">
                                <div class="upload-left">
                                    <i class="fa-solid fa-paperclip"></i>
                                    Pilih Dokumen
                                </div>
                                <div class="upload-right">
                                    Browse
                                </div>
                                @if($doc == 'Pas Foto')
                                <input type="file" accept=".jpeg,.png,.jpg"
                                    name="dokumen[{{ strtolower(str_replace(' ','_',$doc)) }}]">
                                @elseif($doc == 'Dokumen Pernikahan/Perceraian')
                                <input type="file" accept=".pdf,.jpeg,.png,.jpg"
                                    name="dokumen[dokumen_pernikahan]">
                                @else
                                <input type="file" accept=".pdf,.jpeg,.png,.jpg"
                                    name="dokumen[{{ strtolower(str_replace(' ','_',$doc)) }}]">
                                @endif
                            </div>
                            <!-- @if($doc == 'Pas Foto')
                            <div class="file-error text-danger small mt-1"></div>
                            @endif -->
                            <div class="file-error text-danger small mt-1"></div>

                        </div>
                        @endforeach
                    </div>

                </div>

                <!-- ================= PENGALAMAN ================= -->
                <div class="mt-4">

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-semibold mb-0">Data Pengalaman Kerja</h6>
                        <button type="button" class="btn btn-outline-primary btn-sm">
                            + Tambah Pengalaman
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Negara</th>
                                    <th>Posisi</th>
                                    <th>Working Content</th>
                                    <th>Tahun Awal</th>
                                    <th>Tahun Akhir</th>
                                    <th>Alasan Keluar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><input type="text" name="negara"
                                            class="form-control form-control-sm"></td>
                                    <td><input type="text" name="posisi"
                                            class="form-control form-control-sm"></td>
                                    <td><input type="text" name="working_content"
                                            class="form-control form-control-sm"></td>
                                    <td><input type="number" name="tahun_awal"
                                            class="form-control form-control-sm"></td>
                                    <td><input type="number" name="tahun_akhir"
                                            class="form-control form-control-sm"></td>
                                    <td><input type="text" name="alasan_keluar"
                                            class="form-control form-control-sm"></td>
                                    <td><button class="btn btn-danger btn-sm">Hapus</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </form>
        </div>
    </div>

</div>
<script>
    document.getElementById('formDataMigran').addEventListener('submit', function(e) {

        e.preventDefault();

        let form = this;
        let formData = new FormData(form);

        // Hapus error lama
        form.querySelectorAll(".is-invalid").forEach(el => el.classList.remove("is-invalid"));
        form.querySelectorAll(".invalid-feedback").forEach(el => el.remove());

        // let fileInput = document.querySelector('[name="dokumen[pas_foto]"]');

        // console.log(fileInput.files);
        // console.log(fileInput.files.length);
        for (let pair of formData.entries()) {
            console.log(pair[0], pair[1]);
        }

        fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            //.then(response => response.json())
            .then(async res => {
                if (res.status === 422) {
                    // Validasi gagal
                    let data = await res.json();
                    //console.log(data.errors);
                    let errors = data.errors;

                    // Tampilkan error di bawah input
                    for (const key in errors) {
                        let name = key.replace(/\.(\w+)/g, '[$1]');

                        // let inputs = form.querySelectorAll(`[name="${key}"]`);
                        let inputs = form.querySelectorAll(`[name="${name}"]`);


                        if (!inputs.length) continue;

                        // =====================
                        // Jika RADIO
                        // =====================
                        if (inputs[0].type === "radio") {

                            inputs.forEach(radio => {
                                radio.classList.add("is-invalid");
                            });

                            // Cari wrapper terdekat untuk taruh error
                            let wrapper = inputs[0].closest(".mb-3");

                            if (wrapper && !wrapper.querySelector(".invalid-feedback")) {

                                let div = document.createElement("div");
                                div.className = "invalid-feedback d-block";
                                div.innerText = errors[key][0];

                                wrapper.appendChild(div);
                            }

                        }
                        // ================= FILE UPLOAD =================
                        else if (inputs[0].type === "file") {
                            let firstInput = inputs[0];
                            let uploadBox = firstInput.closest(".upload-box");
                            if (uploadBox) {
                                uploadBox.classList.add("is-invalid");
                            }

                            let errorDiv = firstInput.closest(".upload-row")
                                .querySelector(".file-error");

                            if (errorDiv) {
                                errorDiv.innerText = errors[key][0];
                            }
                        } else {

                            // =====================
                            // Input biasa (text, select, file, dll)
                            // =====================
                            let input = inputs[0];
                            input.classList.add("is-invalid");

                            if (!input.nextElementSibling ||
                                !input.nextElementSibling.classList.contains("invalid-feedback")) {

                                let div = document.createElement("div");
                                div.className = "invalid-feedback";
                                div.innerText = errors[key][0];

                                input.after(div);
                            }
                        }
                    }
                    // for (const key in errors) {
                    //     let input = form.querySelector(`[name="${key}"]`);
                    //     if (input) {
                    //         input.classList.add("is-invalid");
                    //         let div = document.createElement("div");
                    //         div.className = "invalid-feedback";
                    //         div.innerText = errors[key][0];
                    //         input.after(div);
                    //     }
                    // }
                } else {
                    return res.json();
                }
            })
            .then(data => {

                if (data.success) {

                    alert(data.message);

                    form.reset();

                } else {
                    alert('Gagal: ' + data.message);
                }

            })
            .catch(error => {
                alert('Terjadi kesalahan sistem');
                console.log(error);
            });

    });
</script>
@endsection
