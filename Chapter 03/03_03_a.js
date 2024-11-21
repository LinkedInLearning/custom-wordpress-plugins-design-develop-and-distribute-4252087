document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.sss-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            // If the button has already been clicked and turned into a navigation button, open the link
            if (this.hasAttribute('data-platform-url')) {
                const platformUrl = this.getAttribute('data-platform-url');
                window.open(platformUrl, '_blank');
                return;
            }

            // Copy the message to the clipboard
            const message = this.getAttribute('data-message');
            navigator.clipboard.writeText(message)
                .then(() => {
                    alert('Message copied to clipboard!'); // Show confirmation

                    // Change the button text
                    const platform = this.classList.contains('sss-facebook')
                        ? 'Facebook'
                        : this.classList.contains('sss-x')
                        ? 'X'
                        : 'LinkedIn';
                    this.textContent = `Go to ${platform}`;

                    // Update the button to act as a link to the respective platform
                    const platformUrl = this.classList.contains('sss-facebook')
                        ? 'https://www.facebook.com/'
                        : this.classList.contains('sss-x')
                        ? 'https://twitter.com/'
                        : 'https://www.linkedin.com/';
                    this.setAttribute('data-platform-url', platformUrl);
                })
                .catch(err => {
                    console.error('Failed to copy message:', err);
                });
        });
    });
});
