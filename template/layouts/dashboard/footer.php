</div> <!-- layout-content -->
</div> <!-- layout -->

<!-- Footer -->
<footer>
    &copy; 2026 Portfolio Admin
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Sidebar toggle
    const toggleBtn = document.getElementById("toggleSidebar");
    const layout = document.querySelector(".layout");

    toggleBtn.addEventListener("click", () => {
        layout.classList.toggle("collapsed");
    });

    // Initialize Bootstrap tooltips
    document.addEventListener("DOMContentLoaded", () => {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
    });
</script>

</body>
</html>
