document.addEventListener('DOMContentLoaded', function() {
    // Get toggle button
    const themeToggle = document.getElementById('theme-toggle');
    if (!themeToggle) return;
    
  
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    
    // Set initial theme
    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        document.body.classList.add('dark-mode');
        updateToggleIcon('dark');
    } else {
        document.body.classList.remove('dark-mode');
        updateToggleIcon('light');
    }
    
    // Toggle theme when button is clicked
    themeToggle.addEventListener('click', function() {
        const isDarkMode = document.body.classList.contains('dark-mode');
        
        if (isDarkMode) {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('theme', 'light');
            updateToggleIcon('light');
        } else {
            document.body.classList.add('dark-mode');
            localStorage.setItem('theme', 'dark');
            updateToggleIcon('dark');
        }
    });
    
  
    function updateToggleIcon(theme) {
        if (theme === 'dark') {
            themeToggle.setAttribute('title', 'Switch to Light Mode');
            // Sun icon is shown through CSS
        } else {
            themeToggle.setAttribute('title', 'Switch to Dark Mode');
            // Moon icon is shown through CSS
        }
    }

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (!localStorage.getItem('theme')) {
            const newTheme = event.matches ? 'dark' : 'light';
            
            if (newTheme === 'dark') {
                document.body.classList.add('dark-mode');
            } else {
                document.body.classList.remove('dark-mode');
            }
            
            updateToggleIcon(newTheme);
        }
    });
});