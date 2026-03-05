var treeInitialized = false;

$("#treeToggleBtn").on("click", function () {
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
            plugins: ["checkbox", "types"],
        });

        $("#tree")
            .on("open_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "open");
            })
            .on("close_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "default");
            });

        treeInitialized = true;
    } else {
        // Refresh data setiap kali tombol diklik
        $("#tree").jstree(true).refresh();
    }
});
function showPermission(id)
{
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
            plugins: ["checkbox", "types"],
        });

        $("#tree")
            .on("open_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "open");
            })
            .on("close_node.jstree", function (e, data) {
                data.instance.set_type(data.node, "default");
            });

        treeInitialized = true;
    } else {
        // Refresh data setiap kali tombol diklik
        $("#tree").jstree(true).refresh();
    }
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

    fetch("/users/" + id + "/edit")
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

        let url =
            save_method == "insert"
                ? "/hakakses"
                : "/hakakses/" + id;

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
                    this.reset;
                    Swal.fire({
                        icon: "success",
                        title: "Berhasil!",
                        text: "Role berhasil ditambahkan",
                        timer: 1500,
                        showCnfirmButton: false,
                    });
                    location.reload();
                } else {
                    let errors = Object.values(data.message).flat().join("\n");
                    //showToast("error", errors, 5000);
                    Swal.fire({
                        icon: "error",
                        title: "Gagal!",
                        text: errors,
                        timer: 1500,
                        showCnfirmButton: false,
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
                    showCnfirmButton: false,
                });
            });
    });
