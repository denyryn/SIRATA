// Get a reference to the iframe element
const templateFrame = document.getElementById("templateFrame");
let zoomLevel = 1;

// Function to zoom the iframe content
function zoomIn() {
    // Check if secure context allows access
    const templateDoc =
        templateFrame.contentDocument || templateFrame.contentWindow.document;
    if (!templateDoc) return; // Abort if document access is not allowed

    // Apply zoom using CSS transform on secure context
    templateDoc.documentElement.style.transform = `scale(${zoomLevel + 0.1})`;
    zoomLevel += 0.1;
}

function zoomOut() {
    // Check if secure context allows access
    const templateDoc =
        templateFrame.contentDocument || templateFrame.contentWindow.document;
    if (!templateDoc) return; // Abort if document access is not allowed

    // Ensure zoom doesn't go negative
    zoomLevel = Math.max(zoomLevel - 0.1, 0.1);
    templateDoc.documentElement.style.transform = `scale(${zoomLevel})`;
}
