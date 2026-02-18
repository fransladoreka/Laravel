@extends('layoutes.main')
@section('head')
<style>
    ul {
        list-style: none;
        padding-left: 20px;
    }

    .tree-item {
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 4px;
        transition: 0.2s;
    }

    .tree-item:hover {
        background-color: #f0f0f0;
    }

    /* PERBAIKAN DI SINI */
    .tree-item.selected {
        background-color: #0d6efd !important;
        color: #fff !important;
    }

    .tree-item.selected span,
    .tree-item.selected i {
        color: #fff !important;
    }

    .children {
        display: none;
    }

    .toggle {
        width: 15px;
        display: inline-block;
    }

    .menu-item {
        padding: 8px 12px;
        cursor: pointer;
    }

    .menu-item:hover {
        background: #f0f0f0;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
@endsection
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Akun</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Akun</li>
    </ol>
    <div class="row">
        <div class="col-md-4 border-end" style="min-height: 500px;">
            <!-- <ul>
                @foreach($akun as $account)
                @include('akun.partials.node', ['account' => $account])
                @endforeach
            </ul> -->
            <div id="tree-container">
                @include('akun.partials.tree')
            </div>
        </div>
        <!-- Kolom Kanan -->
        <div class="col-md-8" id="right-panel">
            <div class="p-4 text-muted text-center">
                Pilih menu edit/tambah untuk menampilkan form
            </div>
        </div>
    </div>
    <div id="context-menu" style="
    position:absolute;
    display:none;
    background:#fff;
    border:1px solid #ccc;
    border-radius:6px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    padding:5px 0;
    z-index:1000;
    min-width:150px;
">
        <div class="menu-item" data-action="add">➕ Tambah</div>
        <div class="menu-item" data-action="edit">✏ Edit</div>
        <div class="menu-item" data-action="delete">🗑 Hapus</div>
    </div>


    <!-- <input type="hidden" id="selected_account"> -->
    <!-- <input id="selected_account"> -->
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.tree-item').forEach(item => {

            item.addEventListener('click', function(e) {

                // Toggle children
                //let children = this.parentElement.querySelector(':scope > .children');
                let toggle = this.querySelector('.toggle');
                // if (children) {
                //     if (children.style.display === 'block') {
                //         children.style.display = 'none';
                //         if (toggle) toggle.textContent = '+';
                //     } else {
                //         children.style.display = 'block';
                //         if (toggle) toggle.textContent = '-';
                //     }
                // }
                let children = item.nextElementSibling;
                if (children && children.classList.contains('children')) {
                    if (children.style.display === 'block') {
                        children.style.display = 'none';
                        if (toggle) toggle.textContent = '+';
                    } else {
                        children.style.display = 'block';
                        if (toggle) toggle.textContent = '-';
                    }
                }

                // Highlight selection
                document.querySelectorAll('.tree-item')
                    .forEach(el => {
                        el.classList.remove('selected');
                        el.style.backgroundColor = "";
                        el.style.color = "";
                    });

                this.classList.add('selected');
                this.style.backgroundColor = "#0d6efd";
                this.style.color = "#fff";

                // Simpan ID
                document.getElementById('selected_account')
                    .value = this.dataset.id;

                e.stopPropagation();
            });

        });

    });
    let rightPanel = document.getElementById('right-panel');

    document.addEventListener("DOMContentLoaded", function() {

        const menu = document.getElementById("context-menu");
        let currentId = null;
        let nama = null;
        let kode = null;

        // Klik kanan
        document.addEventListener("contextmenu", function(e) {

            let item = e.target.closest(".tree-item");
            if (!item) return;

            e.preventDefault();

            currentId = item.dataset.id;

            nama = item.querySelector(".folder-name")?.innerText || "";
            kode = item.querySelector(".folder-kode")?.innerText || "";

            // Highlight selection
            document.querySelectorAll('.tree-item')
                .forEach(el => {
                    el.classList.remove('selected');
                    el.style.backgroundColor = "";
                    el.style.color = "";
                });

            item.classList.add('selected');
            item.style.backgroundColor = "#0d6efd";
            item.style.color = "#fff";

            menu.style.display = "block";
            menu.style.left = e.pageX + "px";
            menu.style.top = e.pageY + "px";

        });

        // Klik menu action
        document.querySelectorAll(".menu-item").forEach(el => {
            el.addEventListener("click", function() {

                let action = this.dataset.action;

                if (action === "add") {
                    rightPanel.innerHTML = `
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        Tambah Akun
                    </div>
                    <div class="card-body">
                        <form id="form-add">
                            <input type="hidden" name="id_parent" value="${currentId}">
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Akun</label>
                                <input type="text" name="akun" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kode Akun</label>
                                <input type="text" name="kode" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </form>
                    </div>
                </div>
            `;
                    // document.addEventListener("submit", function(e) {
                    //     let form = e.target.closest("form");
                    //     if (!form) return;
                    //     alert(form.id)
                    //     if (e.target.id === "form-edit") {
                    //         e.preventDefault();

                    //         let formData = new FormData(e.target);

                    //         fetch("{{ url('akun') }}/" + currentId, {
                    //                 method: "PUT",
                    //                 headers: {
                    //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    //                 },
                    //                 body: formData
                    //             })
                    //             .then(res => res.json())
                    //             .then(data => {
                    //                 reloadTree();
                    //                 rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil diupdate</div>";
                    //             });
                    //     }

                    //     if (e.target.id === "form-add") {

                    //         e.preventDefault();

                    //         let formData = new FormData(e.target);

                    //         fetch("{{ url('akun') }}", {
                    //                 method: "POST",
                    //                 headers: {
                    //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    //                 },
                    //                 body: formData
                    //             })
                    //             .then(res => res.json())
                    //             .then(data => {
                    //                 reloadTree();
                    //                 rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil ditambahkan</div>";
                    //             });
                    //     }

                    // });
                }

                if (action === "edit") {
                    rightPanel.innerHTML = `
                <div class="container-fluid p-0">
    <div class="card shadow-sm border-0 rounded-0">

        <div class="card-header text-white rounded-top-4 d-flex justify-content-between align-items-center"
             style="background: linear-gradient(135deg, #4e73df, #224abe);">
            <h5 class="mb-0 fw-semibold d-flex align-items-center">
                <i class="fas fa-edit me-2"></i> Edit Akun
            </h5>

            <!-- Tombol Close -->
            <button type="button"
                    class="btn btn-sm text-white"
                    style="background: rgba(0,0,0,0.2); border-radius:50%; padding:0.25rem 0.5rem;"
                    onclick="closeCard()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="card-body p-4">
            <form id="form-edit" novalidate>
                <input type="hidden" name="id" value="${currentId}">

                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-hashtag me-1 text-primary"></i> Nama Akun
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-file-invoice text-primary"></i>
                        </span>
                        <input type="text"
                               name="akun"
                               class="form-control form-control-lg"
                               placeholder="Masukkan nama akun"
                               value="${nama}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">
                        <i class="fas fa-hashtag me-1 text-success"></i> Kode Akun
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">
                            <i class="fas fa-key text-success"></i>
                        </span>
                        <input type="text"
                               name="kode"
                               class="form-control form-control-lg"
                               placeholder="Masukkan kode akun"
                               value="${kode}">
                    </div>
                </div>

                <div class="text-right mt-3">
                    <button type="button"
                            class="btn btn-danger btn-lg px-4"
                            onclick="clearFormEdit()">
                        <i class="fas fa-times me-2"></i>
                        Cancel
                    </button>
                    <button type="submit"
                            class="btn btn-success btn-lg px-4">
                        <i class="fas fa-save me-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
            `;

                    const form = document.getElementById("form-edit");
                    form.addEventListener("submit", function(e) {
                        e.preventDefault(); // mencegah reload halaman

                        let formData = new FormData(e.target);
                        console.log("DATA: ", formData);
                        formData.append("_method", "PUT");

                        // Hapus error lama
                        form.querySelectorAll(".is-invalid").forEach(el => el.classList.remove("is-invalid"));
                        form.querySelectorAll(".invalid-feedback").forEach(el => el.remove());

                        fetch("{{ url('akun') }}/" + currentId, {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: formData
                            })
                            // .then(res => res.json())
                            .then(async res => {
                                if (res.status === 422) {
                                    // Validasi gagal
                                    let data = await res.json();
                                    //console.log(data.errors);
                                    let errors = data.errors;

                                    // Tampilkan error di bawah input
                                    for (const key in errors) {
                                        let input = form.querySelector(`[name="${key}"]`);
                                        if (input) {
                                            input.classList.add("is-invalid");
                                            let div = document.createElement("div");
                                            div.className = "invalid-feedback";
                                            div.innerText = errors[key][0];
                                            input.after(div);
                                        }
                                    }
                                } else {
                                    return res.json();
                                }
                            })
                            .then(data => {
                                if (data && data.success) {
                                    reloadTree();
                                    rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil diupdate</div>";
                                }
                            })
                            .catch(err => console.error(err));

                    });
                    // document.getElementById('form-edit').addEventListener("submit", function(e) {
                    //     console.log("EVENT TARGET: ",e.target);
                    //     console.log("this: ",this);
                    //     console.log("TYPE: ",e.target.tagName);
                    //     let form = e.target.closest("form");
                    //     if (!form) return;
                    //     if (e.target.id === "form-edit") {
                    //         e.preventDefault();

                    //         let formData = new FormData(e.target);

                    //         fetch("{{ url('akun') }}/" + currentId, {
                    //                 method: "PUT",
                    //                 headers: {
                    //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    //                 },
                    //                 body: formData
                    //             })
                    //             .then(res => res.json())
                    //             .then(data => {
                    //                 reloadTree();
                    //                 rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil diupdate</div>";
                    //             });
                    //     }

                    //     if (e.target.id === "form-add") {

                    //         e.preventDefault();

                    //         let formData = new FormData(e.target);

                    //         fetch("{{ url('akun') }}", {
                    //                 method: "POST",
                    //                 headers: {
                    //                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    //                 },
                    //                 body: formData
                    //             })
                    //             .then(res => res.json())
                    //             .then(data => {
                    //                 reloadTree();
                    //                 rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil ditambahkan</div>";
                    //             });
                    //     }

                    // });
                }

                if (action === "delete") {
                    alert("Hapus ID: " + currentId);
                }

                menu.style.display = "none";
            });
        });

        // Klik di luar menu → tutup
        document.addEventListener("click", function() {
            menu.style.display = "none";
        });

    });
    document.addEventListener("click", function(e) {
        if (!e.target.closest('.tree-item')) {
            document.querySelectorAll('.tree-item')
                .forEach(el => {
                    el.classList.remove('selected');
                    el.style.backgroundColor = "";
                    el.style.color = "";
                });
            let hidden = document.getElementById("selected_account");
            if (hidden)
                hidden.value = '';
        }
    });

    function reloadTree() {
        fetch("{{ route('akun.tree') }}")
            .then(response => response.text())
            .then(html => {
                //console.log("reloadTree", html);
                document.getElementById("tree-container").innerHTML = html;
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }


    function clearFormEdit() {
        const form = document.getElementById("form-edit");

        // Ambil semua input kecuali yang type hidden
        const inputs = form.querySelectorAll("input:not([type='hidden'])");

        inputs.forEach(input => {
            input.value = "";
        });
    }

    function closeCard() {
        rightPanel.innerHTML = "<div class='p-4 text-muted text-center'>Pilih menu edit/tambah untuk menampilkan form</div>";
    }
    // function reloadTree() {
    //     fetch("{{ route('akun.tree') }}", {
    //             method: "GET",
    //             headers: {
    //                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    //             }
    //         })
    //         .then(response => response.text())
    //         .then(data => {
    //             console.log("reloadTree", data);
    //         })
    //         .then(html => {
    //             document.getElementById("tree-container").innerHTML = html;
    //         })
    //         .catch(error => {
    //             console.error("Error:", error);
    //         });
    // }



    // document.addEventListener("DOMContentLoaded", function() {
    //     document.addEventListener("submit", function(e) {
    //         let form=e.target.closest("form");
    //         if(!form) return;
    //         alert(form.id)
    //         if (e.target.id === "form-edit") {
    //             e.preventDefault();

    //             let formData = new FormData(e.target);

    //             fetch("{{ url('akun') }}/" + currentId, {
    //                     method: "PUT",
    //                     headers: {
    //                         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    //                     },
    //                     body: formData
    //                 })
    //                 .then(res => res.json())
    //                 .then(data => {
    //                     reloadTree();
    //                     rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil diupdate</div>";
    //                 });
    //         }

    //         if (e.target.id === "form-add") {

    //             e.preventDefault();

    //             let formData = new FormData(e.target);

    //             fetch("{{ url('akun') }}", {
    //                     method: "POST",
    //                     headers: {
    //                         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    //                     },
    //                     body: formData
    //                 })
    //                 .then(res => res.json())
    //                 .then(data => {
    //                     reloadTree();
    //                     rightPanel.innerHTML = "<div class='p-4 text-success'>Berhasil ditambahkan</div>";
    //                 });
    //         }

    //     });
    // });
</script>
@endsection