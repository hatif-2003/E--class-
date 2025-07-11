<script>
  // Sidebar Toggle for Mobile
  const sidebar = document.querySelector('.sidebar');
  const toggleBtn = document.querySelector('.sidebar-toggle');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
  });

  // Dropdown Menu Toggle
  document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      const dropdown = item.nextElementSibling;
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
      item.classList.toggle('active');
    });
  });
</script>