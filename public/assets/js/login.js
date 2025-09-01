/* ============================================================================
   LOGIN PAGE JS
   - Toggle tampil/sembunyi password dengan ikon Bootstrap Icons.
   - Ikon otomatis berganti: eye-slash (hidden) ↔ eye (visible).
   ============================================================================ */

   document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.toggle-pass');
    const input = document.getElementById('password');
  
    if (!btn || !input) return;
  
    btn.addEventListener('click', () => {
      const isVisible = input.type === 'text';
      // Ubah tipe input
      input.type = isVisible ? 'password' : 'text';
      // Update state ARIA -> berguna untuk assistive tech
      btn.setAttribute('aria-pressed', String(!isVisible));
      // Ganti ikon
      const icon = btn.querySelector('i');
      if (icon) icon.className = isVisible ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
  
    // Bonus kecil: tekan Enter di field password = submit form
    input.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        const form = input.closest('form');
        if (form) form.requestSubmit();
      }
    });
  });
  