document.addEventListener("DOMContentLoaded", function () {
    loadContent();
    updateContent();
});

const elements = [
    // isi surat
    "perihal",
    "nama_tujuan",
    "alamat_tujuan",
    "upper_body",
    "lower_body",
    "id_jabatan",

    // "id_user1",
    // "id_user2",
    // "id_user3",
    // "id_user4",
    // "id_user5",
    // "id_user6",
    // "id_user7",

    // pecahan dari body
    "lower_body_part",
    "lower_body_part1",
    "lower_body_part2",
    "hormat",
    "maksud",
    "jam_mulai",
    "jam_selesai",
    "tempat",
    "acara",
    "perlengkapan",
    "peserta",
    "tanggal",
    "tanggal_mulai",
    "tanggal_selesai",

    // tambahan fitur
    "waktu_selesai_null",
];

function loadContent() {
    const templateFrame = document.getElementById("templateFrame");
    const templateDocument =
        templateFrame.contentDocument || templateFrame.contentWindow.document;

    let elementId;

    for (elementId of elements) {
        const element = getElementSafely(
            templateDocument,
            `${elementId}Content`,
        );
        const inputElement = getElementSafely(document, `${elementId}`);

        if (element && inputElement && inputElement.value.trim() === "") {
            inputElement.value = element.innerHTML.trim();
            inputElement.value = element.innerHTML.trim().replace(/\s+/g, " ");
        }
    }
}

function updateContent() {
    const templateFrame = document.getElementById("templateFrame");
    const templateDocument =
        templateFrame.contentDocument || templateFrame.contentWindow.document;

    let elementId;
    let data;

    for (elementId of elements) {
        const element = getElementSafely(
            templateDocument,
            `${elementId}Content`,
        );

        switch (elementId) {
            case "tanggal":
                data = formatDateType1Safely(elementId);
                break;

            case "waktu_selesai_null":
                const jam_selesaiContent = getElementSafely(
                    templateDocument,
                    `jam_selesaiContent`,
                );
                const jam_selesaiContainer = getElementSafely(
                    document,
                    `jam_selesaiContainer`,
                );
                const jam_selesaiInput = getElementSafely(
                    document,
                    `jam_selesai`,
                );
                const sdSpan = getElementSafely(document, `sd`);

                if (isRadioChecked(elementId)) {
                    jam_selesaiContainer.classList.add("hidden");
                    jam_selesaiInput.removeAttribute("required");
                    sdSpan.innerHTML = "s.d Selesai";

                    data = "WIB s.d Selesai";

                    if (jam_selesaiContent) {
                        jam_selesaiContent.innerHTML = data;
                    }
                } else {
                    jam_selesaiContainer.classList.remove("hidden");
                    !jam_selesaiInput.hasAttribute("required")
                        ? jam_selesaiInput.setAttribute("required", "")
                        : "";
                    sdSpan.innerHTML = "s.d";

                    data = " s.d " + jam_selesaiInput.value + " WIB";

                    if (jam_selesaiContent) {
                        jam_selesaiContent.innerHTML = data;
                    }
                }
                break;

            case "id_jabatan":
                const jabatan_input = getElementSafely(document, elementId);
                const selectedJabatan =
                    jabatan_input.options[jabatan_input.selectedIndex];

                var nama_jabatanVal = selectedJabatan.dataset.nama_jabatan;
                var pemilik_jabatanVal =
                    selectedJabatan.dataset.pemilik_jabatan;
                var nip_jabatanVal = selectedJabatan.dataset.nip_jabatan;

                var nama_jabatanContainer = getElementSafely(
                    templateDocument,
                    `nama_jabatanContent`,
                );
                var pemilik_jabatanContainer = getElementSafely(
                    templateDocument,
                    `pemilik_jabatanContent`,
                );
                var nip_jabatanContainer = getElementSafely(
                    templateDocument,
                    `nip_jabatanContent`,
                );

                if (nama_jabatanContainer) {
                    nama_jabatanContainer.innerHTML = nama_jabatanVal
                        ? nama_jabatanVal
                        : "........";
                }

                if (pemilik_jabatanContainer) {
                    pemilik_jabatanContainer.innerHTML = pemilik_jabatanVal
                        ? toTitleCase(pemilik_jabatanVal)
                        : "........";
                }

                if (nip_jabatanContainer) {
                    nip_jabatanContainer.innerHTML = nip_jabatanVal
                        ? nip_jabatanVal
                        : "........";
                }

                break;

            default:
                if (elementId.includes("tanggal")) {
                    data = formatDateType2Safely(elementId);
                    break;
                }

                // if (elementId.includes("id_user")) {
                //     const user_row = getElementSafely(
                //         templateDocument,
                //         `${elementId}Content`,
                //     );

                //     if (!user_row) {
                //         // Create a new <tr> element
                //         var newRow = document.createElement("tr");
                //         newRow.style.border = "1px solid #000";
                //         newRow.style.padding = "0.1cm";

                //         // Create and append <td> elements with inner content
                //         var cell1 = document.createElement("td");
                //         cell1.style.border = "1px solid #000";
                //         cell1.style.padding = "0.1cm";
                //         cell1.style.textAlign = "center";
                //         cell1.textContent = "..."; // Replace '...' with actual content

                //         var cell2 = document.createElement("td");
                //         cell2.id = `nama_${elementId}Content`; // Set the id attribute
                //         cell2.style.border = "1px solid #000";
                //         cell2.style.padding = "0.1cm";
                //         cell2.style.textAlign = "justify";
                //         cell2.textContent = "..."; // Replace '...' with actual content

                //         var cell3 = document.createElement("td");
                //         cell3.id = `nim_${elementId}Content`; // Set the id attribute
                //         cell3.style.border = "1px solid #000";
                //         cell3.style.padding = "0.1cm";
                //         cell3.style.textAlign = "center";
                //         cell3.textContent = "..."; // Replace '...' with actual content

                //         var cell4 = document.createElement("td");
                //         cell4.id = `program_${elementId}Content`; // Set the id attribute
                //         cell4.style.border = "1px solid #000";
                //         cell4.style.padding = "0.1cm";
                //         cell4.style.textAlign = "center";
                //         cell4.textContent = "..."; // Replace '...' with actual content

                //         // Append the cells to the row
                //         newRow.appendChild(cell1);
                //         newRow.appendChild(cell2);
                //         newRow.appendChild(cell3);
                //         newRow.appendChild(cell4);

                //         // Append the row to the table (assuming you have a table with id 'user_containerContent')
                //         var table = document.getElementById(
                //             "user_containerContent",
                //         );

                //         table.appendChild(newRow);
                //     }

                //     const user_input = getElementSafely(document, elementId);
                //     const selectedUser =
                //         user_input.options[user_input.selectedIndex];

                //     var nama_userVal = selectedUser.dataset.nama_user;
                //     var ni_userVal = selectedUser.dataset.ni_user;
                //     var prodi_userVal = selectedUser.dataset.prodi_user;
                //     var golongan_userVal = selectedUser.dataset.golongan_user;

                //     var nama_userContainer = getElementSafely(
                //         templateDocument,
                //         `nama_${elementId}Content`,
                //     );

                //     var ni_userContainer = getElementSafely(
                //         templateDocument,
                //         `ni_${elementId}Content`,
                //     );

                //     var prodi_userContainer = getElementSafely(
                //         templateDocument,
                //         `prodi_${elementId}Content`,
                //     );

                //     var golongan_userContainer = getElementSafely(
                //         templateDocument,
                //         `golongan_${elementId}Content`,
                //     );

                //     if (nama_userContainer) {
                //         nama_userContainer.innerHTML = nama_userVal
                //             ? nama_userVal
                //             : "........";
                //     }

                //     if (ni_userContainer) {
                //         ni_userContainer.innerHTML = ni_userVal
                //             ? ni_userVal
                //             : "........";
                //     }

                //     if (prodi_userContainer) {
                //         prodi_userContainer.innerHTML = prodi_userVal
                //             ? prodi_userVal
                //             : "........";
                //     }

                //     if (golongan_userContainer) {
                //         golongan_userContainer.innerHTML = golongan_userVal
                //             ? golongan_userVal
                //             : "........";
                //     }
                //     break;
                // }

                data = getElementValueSafely(elementId);
                break;
        }

        console.log(
            `Element ID: ${elementId}, Element:`,
            element,
            "Data:",
            data,
        );

        if (element && data !== null && !isInputHidden(elementId)) {
            if (element) element.innerHTML = data;
            console.log(`Updated element with ID '${elementId}'.`);
        } else {
            console.log(`Skipped updating element with ID '${elementId}'.`);
        }

        if (
            element &&
            data !== null &&
            isInputHidden(elementId) &&
            elementId.includes("body")
        ) {
            const elementValue = getElementInnerHTML(
                templateDocument,
                `${elementId}Content`,
            );
            console.log(`upper_body :'${elementValue}'`);
            const inputElement = document.getElementById(elementId);
            inputElement.value = elementValue;
        }
    }
}

function isRadioChecked(id) {
    const element = document.getElementById(id);
    return element ? element.checked : false;
}

function getElementByIdSafely(document, id) {
    const element = document.getElementById(id);
    return element ? element : null;
}

function getElementValueSafely(id) {
    const element = document.getElementById(id);
    return element ? element.value : null;
}

function getElementInnerHTML(document, id) {
    const element = document.getElementById(id);
    return element ? element.innerHTML : null;
}

function getElementSafely(document, id) {
    return document.querySelector(`#${id}`);
}

function formatDateType2Safely(id) {
    const element = document.getElementById(id);
    if (!element) return null;

    const tanggal = element.value;
    const dateObject = new Date(tanggal);
    const options = {
        day: "numeric",
        month: "long",
        year: "numeric",
        timeZone: "UTC",
    };

    return dateObject.toLocaleDateString("id-ID", options);
}

function formatDateType1Safely(id) {
    const element = document.getElementById(id);
    if (!element) return null;

    const tanggal = element.value;
    const dateObject = new Date(tanggal);
    const options = {
        weekday: "long",
        day: "numeric",
        month: "long",
        year: "numeric",
        timeZone: "UTC",
    };

    return element ? dateObject.toLocaleDateString("id-ID", options) : null;
}

function toTitleCase(str) {
    return str.toLowerCase().replace(/(^|\s)\w/g, function (char) {
        return char.toUpperCase();
    });
}

function isInputHidden(id) {
    const inputElement = document.getElementById(id);
    return inputElement ? inputElement.hasAttribute("hidden") : false;
}
