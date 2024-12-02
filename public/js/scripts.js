document.addEventListener("DOMContentLoaded", function () {
    console.log("Custom JavaScript loaded!");
});
function adjustFeedLayout() {
    const feedCount = document.getElementById("feeds_per_row").value; // Get selected number of feeds per row
    const postGallery = document.getElementById("post-gallery");

    // Set the grid template columns to create the specified number of columns
    postGallery.style.gridTemplateColumns = `repeat(${feedCount}, 1fr)`; // Adjust columns for grid layout
}

// Call the function once to apply the initial layout when the page loads
adjustFeedLayout();
