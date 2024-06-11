document.addEventListener("DOMContentLoaded", function () {
    var Block = Quill.import("blots/block");

    class SpanBlock extends Block {
        static blotName = "block";
        static tagName = "span";
    }

    Quill.register(SpanBlock);

    var textareas = document.querySelectorAll("textarea");

    // Filter out textareas with the hidden attribute
    var visibleTextareas = Array.from(textareas).filter(function (textarea) {
        return !textarea.hasAttribute("hidden");
    });

    visibleTextareas.forEach(function (textarea) {
        var container = document.createElement("div");
        container.style.minHeight = "100px"; // Set a minimum height for the editor
        textarea.style.display = "none"; // Hide the original textarea
        textarea.parentNode.insertBefore(container, textarea.nextSibling);

        var quill = new Quill(container, {
            theme: "snow",
            modules: {
                toolbar: [["bold", "italic", "underline", "strike"]],
            },
        });

        quill.root.style.color = "black";
        quill.root.style.minHeight = "20px"; // Set a minimum height
        quill.root.style.padding = "10px"; // Optional: add some padding

        function adjustEditorHeight() {
            container.style.height = "auto"; // Temporarily set height to auto to get the scroll height
            container.style.height = quill.root.scrollHeight + "px"; // Set height based on scroll height
        }

        adjustEditorHeight();

        quill.on("text-change", function () {
            textarea.value = quill.root.innerHTML;
            textarea.dispatchEvent(new Event("change"));
            adjustEditorHeight();
        });

        quill.root.innerHTML = textarea.value;
        adjustEditorHeight();
    });
});
