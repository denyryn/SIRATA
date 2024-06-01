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

        if (inputElement && inputElement.value.trim() === "") {
            const frameElement = element.innerHTML;
            inputElement.value = frameElement.trim();
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

            default:
                if (elementId.includes("tanggal")) {
                    data = formatDateType2Safely(elementId);
                } else {
                    data = getElementValueSafely(elementId);
                }
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

function isInputHidden(id) {
    const inputElement = document.getElementById(id);
    return inputElement ? inputElement.hasAttribute("hidden") : false;
}
