var treeInitialized = false;
var isTreeReady = false;

document.addEventListener("DOMContentLoaded", function () {
    const dataTable = new simpleDatatables.DataTable("#tableHakAkses", {
        perPage: 10, // jumlah data per halaman
        //perPageSelect: [5, 10, 15, 20],
        perPageSelect: false,
        searchable: true,
        sortable: true,
        labels: {
            placeholder: "Cari...",
            perPage: "data per halaman",
            noRows: "Tidak ada data",
            info: "Menampilkan {start} sd {end} dari {rows} data",
            noResults: "Data tidak ditemukan",
        },
    });
    // Fungsi menambahkan label search
    function addSearchLabel() {
        const searchContainer = document.querySelector(".datatable-search");
        if (!searchContainer) return false; // belum muncul

        // cek jika label belum ada
        if (!searchContainer.querySelector("label")) {
            const label = document.createElement("label");
            label.innerText = "Pencarian:";
            label.style.marginRight = "8px";

            searchContainer.prepend(label);

            // Flex agar label sejajar dengan input
            searchContainer.style.display = "flex";
            searchContainer.style.alignItems = "center";
            searchContainer.style.gap = "4px";
        }

        return true; // label berhasil ditambahkan
    }

    // Pakai interval check setiap 50ms
    const interval = setInterval(() => {
        if (addSearchLabel()) {
            clearInterval(interval); // stop interval jika label sudah ada
        }
    }, 50);
});
function addSearchLabel(tableId, labelText = "Pencarian:") {
    // Cari wrapper DataTable dari tabel
    const wrapper = document
        .querySelector(`#${tableId}`)
        .closest(".dataTable-wrapper");
    if (!wrapper) return;

    // Cari container search (sesuai DOM terbaru)
    const searchContainer = wrapper.querySelector(".datatable-search"); // huruf kecil semua
    if (!searchContainer) return;

    // Pastikan label belum ditambahkan
    if (!searchContainer.querySelector("label")) {
        const label = document.createElement("label");
        label.innerText = labelText;
        label.style.marginRight = "8px";

        // Tambahkan label sebelum input
        searchContainer.prepend(label);

        // Flex agar label dan input sejajar
        searchContainer.style.display = "flex";
        searchContainer.style.alignItems = "center";
        searchContainer.style.gap = "4px";
    }
}

$("#treeToggleBtn").on("click", function () {
    isTreeReady = false;
    var collapseEl = document.getElementById("treeContainer");
    var bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);

    // Hanya buka jika collapse belum terlihat
    if (!collapseEl.classList.contains("show")) {
        bsCollapse.show();
    }

    // Inisialisasi tree sekali
    if (!treeInitialized) {
        $("#tree").jstree({
            core: {
                data: {
                    url: "/hakakses/permission",
                    dataType: "json",
                },
                multiple: true,
                themes: {
                    dots: false,
                },
            },
            types: {
                default: { icon: "fas fa-folder text-warning" },
                open: { icon: "fas fa-folder-open text-warning" },
            },
            checkbox: {
                keep_selected_style: false,
                three_state: true,
                cascade: "up+down",
            },
            plugins: ["checkbox", "types", "changed"],
        });

        $("#tree")
            .on("open_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "open");
            })
            .on("close_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "default");
            })
            .on("ready.jstree", function () {
                isTreeReady = true;
            })
            .on("changed.jstree", function (e, data) {
                if (!isTreeReady) return;
                console.log("Selection/Check state changed!");
                var x = document.getElementById("tombolSimpanPermission");
                x.style.display = "block";
            });

        treeInitialized = true;
    } else {
        // Refresh data setiap kali tombol diklik
        $("#tree").jstree(true).refresh();
    }
});

let ignoreChangeEvent = false;
let currentId = null;
function showPermission(id) {
    const tombol = document.getElementById("tombolSimpanPermission");
    tombol.style.display = "none";
    currentId = id;
    const collapseEl = document.getElementById("treeContainer");
    const bsCollapse = bootstrap.Collapse.getOrCreateInstance(collapseEl);

    if (!collapseEl.classList.contains("show")) {
        bsCollapse.show();
    }
    ignoreChangeEvent = true;
    // destroy jsTree lama (jika sudah ada)
    if ($("#tree").jstree(true)) {
        $("#tree").jstree("destroy").empty();
    }

    $("#tree").jstree({
        core: {
            // data: {
            //     url: "/hakakses/" + currentId + "/permission",
            //     dataType: "json",
            //     // data: { id: id },
            // },
            data: {
                url: function (node) {
                    return "/hakakses/" + currentId + "/permission";
                },
                dataType: "json",
            },
            multiple: true,
            themes: { dots: false },
        },
        checkbox: {
            keep_selected_style: false,
            three_state: true,
            cascade: "up+down",
        },
        types: {
            default: { icon: "fas fa-folder text-warning" },
            open: { icon: "fas fa-folder-open text-warning" },
        },
        plugins: ["checkbox", "types", "changed"],
    });

    $("#tree")
        .on("ready.jstree", function () {
            ignoreChangeEvent = false;
        })
        .on("changed.jstree", function (e, data) {
            if (ignoreChangeEvent) return;

            if (
                data.action === "select_node" ||
                data.action === "deselect_node"
            ) {
                document.getElementById(
                    "tombolSimpanPermission",
                ).style.display = "block";
            }
        })

        .on("open_node.jstree", function (e, data) {
            data.instance.set_type(data.node, "open");
        })

        .on("close_node.jstree", function (e, data) {
            data.instance.set_type(data.node, "default");
        });
}

function SimpanPermission() {
    const tombol = document.getElementById("tombolSimpanPermission");
    let btnSpinner = tombol.querySelector(".btn-spinner");

    if (!btnSpinner) {
        btnSpinner = document.createElement("span");
        btnSpinner.classList.add("btn-spinner");
        tombol.appendChild(btnSpinner);
    }

    const btnText = tombol.querySelector(".btn-text");
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    const selected = $("#tree").jstree("get_bottom_checked");
    if (!selected.length) return;
    tombol.disabled = true;
    btnSpinner.style.display = "inline-block";
    btnText.style.visibility = "hidden"; // sembunyikan teks tombol saat spinner
    $.ajax({
        url: "/hakakses/" + currentId + "/simpanpermission",
        type: "POST",
        data: {
            permissions: selected,
            _token: token,
        },
        success: function () {
            Swal.fire({
                icon: "success",
                title: "Berhasil!",
                text: "Permissions berhasil disimpan!",
                timer: 1500,
                showConfirmButton: false,
            });
            tombol.disabled = false;
            btnSpinner.style.display = "none";
            btnText.style.visibility = "visible";
        },
        error: function (xhr) {
            let message = "Terjadi kesalahan pada server.";

            // jika backend mengirim message JSON
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            Swal.fire({
                icon: "error",
                title: "Gagal!",
                text: message,
            });
            tombol.disabled = false;
            btnSpinner.style.display = "none";
            btnText.style.visibility = "visible";
            console.error("Error:", xhr);
        },
    });
}

let save_method;

function createData() {
    save_method = "insert";

    document.getElementById("modalTitle").innerText = "Tambah Data";

    document.getElementById("formHakAkses").reset();
    document.getElementById("method").value = "";

    let modal = new bootstrap.Modal(document.getElementById("modalForm"));
    modal.show();
}

function editData(id) {
    save_method = "update";

    fetch("/hakakses/" + id + "/edit")
        .then((res) => res.json())
        .then((data) => {
            document.getElementById("id").value = data.id;
            document.getElementById("kode").value = data.kode;
            document.getElementById("name").value = data.name;
            document.getElementById("description").value = data.description;

            document.getElementById("method").value = "PUT";

            document.getElementById("modalTitle").innerText = "Edit Data";

            let modal = new bootstrap.Modal(
                document.getElementById("modalForm"),
            );
            modal.show();
        });
}

document
    .getElementById("formHakAkses")
    .addEventListener("submit", function (e) {
        e.preventDefault();

        let id = document.getElementById("id").value;

        let url = save_method == "insert" ? "/hakakses" : "/hakakses/" + id;

        let formData = new FormData(this);
        // Hapus error lama
        const form = document.getElementById("formHakAkses");
        form.querySelectorAll(".is-invalid").forEach((el) =>
            el.classList.remove("is-invalid"),
        );
        form.querySelectorAll(".invalid-feedback").forEach((el) => el.remove());

        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
            },

            body: formData,
        })
            .then(async (res) => {
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
            .then((data) => {
                if (data && data.success) {
                    this.reset();
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                    location.reload();
                } else {
                    //let errors = Object.values(data.message).flat().join("\n");
                    //showToast("error", errors, 5000);
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: data.message,
                        timer: 1500,
                        showConfirmButton: false,
                    });
                }
            })
            .catch((err) => {
                console.error(err);
                //showToast("error", "Terjadi kesalahan server!", 5000);
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: "Terjadi kesalahan server!",
                    timer: 1500,
                    showConfirmButton: false,
                });
            });
    });

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dropdownBtn").forEach((btn) => {
        const menu = btn.nextElementSibling;

        btn.addEventListener("click", (e) => {
            e.stopPropagation();

            // tutup menu lain
            document.querySelectorAll(".dropdownMenu").forEach((m) => {
                if (m !== menu) m.style.display = "none";
            });

            const isVisible = menu.style.display === "block";
            if (isVisible) {
                menu.style.display = "none";
                return;
            }

            // pindahkan menu ke body agar tidak mempengaruhi scroll tabel
            document.body.appendChild(menu);

            // tampilkan sementara agar offsetWidth terbaca
            menu.style.display = "block";
            menu.style.visibility = "hidden"; // tetap tersembunyi

            // hitung posisi tombol
            const rect = btn.getBoundingClientRect();

            // posisi menu tepat di bawah tombol, kanan sejajar tombol
            menu.style.top = rect.bottom + window.scrollY + "px";
            menu.style.left =
                rect.right - menu.offsetWidth + window.scrollX + "px";

            // sekarang tampilkan menu
            menu.style.visibility = "visible";
        });
    });

    // klik di luar → tutup menu
    document.addEventListener("click", () => {
        document.querySelectorAll(".dropdownMenu").forEach((menu) => {
            menu.style.display = "none";
        });
    });
});
