<footer class="bg-gray-800 py-8 mt-10">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-300 text-sm mb-2">
            &copy; 2023 EduVerse. All Rights Reserved.
        </p>
        <div class="mt-2">
            <a href="#" class="text-gray-400 hover:text-white px-3">Privacy Policy</a>
            <a href="#" class="text-gray-400 hover:text-white px-3">Terms of Use</a>
        </div>
    </div>
</footer>


</body>
<script src="/View/assets/js/index.js"></script>
<script>
    <?php
    $message = '';
    $key = '';
    if (isset($_SESSION['Error'])) {
        $message = $_SESSION['Error'];
        $key = "error";
        unset($_SESSION['Error']);
    } elseif (isset($_SESSION['Success'])) {
        $message = $_SESSION['Success'];
        $key = "success";
        unset($_SESSION['Success']);
    }
    ?>
    document.addEventListener('DOMContentLoaded', function() {
        let message = "<?= $message; ?>";
        let key = "<?= $key ?>";
        if (message) {
            Swal.fire({
                icon: key,
                title: 'Message',
                text: message,
            });
        }
    });
</script>
</html>