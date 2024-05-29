// Get all textarea elements
const textareas = document.getElementsByTagName("textarea");

// Iterate through each textarea and attach event listener
for (let i = 0; i < textareas.length; i++) {
    textareas[i].addEventListener("keydown", function (event) {
        // Check if Enter key is pressed (key code 13)
        if (event.keyCode === 13) {
            // Prevent the default behavior of the Enter key
            event.preventDefault();

            // Insert <br> tag at the cursor position
            const cursorPos = this.selectionStart;
            const textBeforeCursor = this.value.substring(0, cursorPos);
            const textAfterCursor = this.value.substring(cursorPos);
            this.value = textBeforeCursor + "<br>\n" + textAfterCursor;

            // Move the cursor position after the inserted <br> tag
            const newPos = cursorPos + 5; // 4 characters for <br>, 1 for \n
            this.setSelectionRange(newPos, newPos);
        }
    });
}
