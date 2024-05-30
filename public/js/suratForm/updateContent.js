function updateContent() {
    const templateFrame = document.getElementById("templateFrame");
    const templateDocument =
        templateFrame.contentDocument || templateFrame.contentWindow.document;

    const elements = [
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
    ];

    for (const elementId of elements) {
        const element = getElementSafely(
            templateDocument,
            `${elementId}Content`,
        );

        let data;
        if (elementId === "tanggal") {
            data = formatDateType1Safely(elementId); // Use formatDateSafely for tanggal element
        } else if (elementId !== "tanggal" && elementId.includes("tanggal")) {
            data = formatDateType2Safely(elementId);
        } else {
            data = getElementValueSafely(elementId); // Use getElementValueSafely for other elements
        }

        console.log(
            `Element ID: ${elementId}, Element:`,
            element,
            "Data:",
            data,
        );

        if (element && data !== null && !isInputHidden(elementId)) {
            element.innerHTML = data;
            console.log(`Updated element with ID '${elementId}'.`);
        } else {
            console.log(`Skipped updating element with ID '${elementId}'.`);
        }

        if (element && data !== null && isInputHidden(elementId)) {
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
