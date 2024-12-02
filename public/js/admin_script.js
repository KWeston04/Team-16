function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.section');
    sections.forEach(section => {
      section.classList.add('hidden');
    });
  
    // Show the clicked section
    const activeSection = document.getElementById(sectionId);
    activeSection.classList.remove('hidden');
  }
  
  // Set Dashboard as default section visible
  document.addEventListener("DOMContentLoaded", () => {
    showSection('dashboard');
  });
  
  