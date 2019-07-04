<script>
if (window.netlifyIdentity) {
    window.netlifyIdentity.on('init', (user) => {
        if (!user) {
            window.netlifyIdentity.on('login', () => {
                document.location.href = '/admin/';
            });
        }
    });
}
</script>
<?php /**PATH C:\whs-webiste\source/_partials/cms/identity_redirect.blade.php ENDPATH**/ ?>