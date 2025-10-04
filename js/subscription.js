document.addEventListener('DOMContentLoaded', function() {
    const subscriptionForms = document.querySelectorAll('form[action="mailing/subscription.php"]');
    
    subscriptionForms.forEach(function(form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = form.querySelector('input[type="email"]');
            const submitButton = form.querySelector('input[type="submit"]');
            const email = emailInput.value.trim();
            
            if (!email) {
                showMessage(form, 'Please enter your email address', 'error');
                return;
            }
            
            submitButton.disabled = true;
            submitButton.value = 'Subscribing...';
            
            const formData = new FormData();
            formData.append('email', email);
            
            fetch('mailing/subscription.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showMessage(form, data.message, 'success');
                    emailInput.value = '';
                } else {
                    showMessage(form, data.message, 'error');
                }
            })
            .catch(error => {
                showMessage(form, 'An error occurred. Please try again later.', 'error');
            })
            .finally(() => {
                submitButton.disabled = false;
                submitButton.value = 'Subscribe';
            });
        });
    });
    
    function showMessage(form, message, type) {
        let messageDiv = form.querySelector('.subscription-message');
        
        if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.className = 'subscription-message';
            form.appendChild(messageDiv);
        }
        
        messageDiv.textContent = message;
        messageDiv.className = 'subscription-message ' + type;
        messageDiv.style.display = 'block';
        
        setTimeout(function() {
            messageDiv.style.display = 'none';
        }, 5000);
    }
});
