document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById("pengajuContainer");
    const addButton = document.getElementById("addPengajuBtn");
    const removeButton = document.getElementById("removePengajuBtn");
    const form = document.getElementById("surat_form");
    let newOption;

    let count = 1;

    addButton.addEventListener("click", function () {
        if (count <= 8) {
            count++;

            const newSelect = createSelectElement(count);
            container.appendChild(newSelect);
        } else {
            alert("Maximum limit reached (8)");
        }
    });

    removeButton.addEventListener("click", function () {
        if (count > 1) {
            count--;
            container.removeChild(container.lastElementChild);
        }
    });

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        // Get all select elements
        const selectElements = document.querySelectorAll(
            'select[name^="id_user"]',
        );
        const selectedValues = {};

        // Loop through select elements and get selected values
        selectElements.forEach(function (select) {
            const selectedOption = select.options[select.selectedIndex];
            if (selectedOption.value !== "") {
                const name = select.getAttribute("name");
                selectedValues[name] = selectedOption.value;
            }
        });

        // Set the selected values to hidden input fields in the form
        Object.keys(selectedValues).forEach(function (key) {
            const hiddenInput = document.createElement("input");
            hiddenInput.setAttribute("type", "hidden");
            hiddenInput.setAttribute("name", key);
            hiddenInput.setAttribute("value", selectedValues[key]);
            form.appendChild(hiddenInput);
        });

        // Set the final count value to a hidden input field in the form
        const countInput = document.createElement("input");
        countInput.setAttribute("type", "hidden");
        countInput.setAttribute("name", "count");
        countInput.setAttribute("value", count);
        form.appendChild(countInput);

        // Submit the form
        form.submit();
    });

    function createSelectElement(index) {
        const newSelect = document.createElement("select");
        newSelect.setAttribute(
            "class",
            "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mt-1",
        );
        newSelect.setAttribute("name", `id_user${index}`); // Use array notation for multiple selections
        newSelect.setAttribute("id", `id_user${index}`); // Use array notation for multiple selections
        newSelect.setAttribute("required", "required");

        const option = document.createElement("option");
        option.setAttribute("value", "");
        option.textContent = "Pilih Pengaju Tambahan ";
        newSelect.appendChild(option);

        // Check if dosens is available and not empty
        if (
            typeof dosens !== "undefined" &&
            dosens !== null &&
            dosens.length > 0
        ) {
            // Add options from dosens data
            dosens.forEach(function (item) {
                const newOption = document.createElement("option");
                newOption.setAttribute("value", item.id_user);
                newOption.textContent = item.nama_dosen;
                newSelect.appendChild(newOption);
            });
        } else if (
            typeof mahasiswas !== "undefined" &&
            mahasiswas !== null &&
            mahasiswas.length > 0
        ) {
            // Add options from mahasiswas data
            mahasiswas.forEach(function (item) {
                const newOption = document.createElement("option");
                newOption.setAttribute("value", item.id_user);
                newOption.textContent = item.nama_mahasiswa;
                newSelect.appendChild(newOption);
            });
        } else {
            console.error("No data available for dosens or mahasiswas.");
        }

        return newSelect;
    }
});
