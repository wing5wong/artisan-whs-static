<script src="https://identity.netlify.com/v1/netlify-identity-widget.js" defer></script>

<script defer>
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
    