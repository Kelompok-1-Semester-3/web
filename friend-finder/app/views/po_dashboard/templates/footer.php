</div>
</div>


<script src="<?= BASE_URL ?>/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="<?= BASE_URL ?>/js/dashboard.js"></script>
<script>
    function goBack() {
        window.history.back();
    }
</script>
<script src="<?= BASE_URL ?>/js/jquery.js"></script>
<script src="<?= BASE_URL ?>/js/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table_transaction').DataTable();
    });

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>
<script src="<?= BASE_URL ?>/js/kodeku.js"></script>
</body>

</html>