require('./bootstrap');

document.addEventListener('DOMContentLoaded', (event) =>
{
    document.querySelectorAll('.code-container code').forEach((block) =>
    {
        // Remove any whitespace
        block.innerHTML = block.innerHTML.trim();
        // Highlight the code
        hljs.highlightBlock(block);
    });
});
