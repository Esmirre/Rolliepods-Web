/* ROLLIEPODS - Main JavaScript */
document.addEventListener('DOMContentLoaded', () => {
    initMobileNav();
    initAnnouncementModal();
    initPostEditor();
});

/* 1. Mobile navigation toggle */
function initMobileNav() {
    const btn = document.querySelector('.mobile-nav-toggle');
    const nav = document.querySelector('.header-nav');
    if (!btn || !nav) return;

    btn.addEventListener('click', () => {
        const open = nav.classList.toggle('active');
        btn.setAttribute('aria-expanded', open);
    });
    document.addEventListener('click', (e) => {
        if (nav.classList.contains('active') && !nav.contains(e.target) && !btn.contains(e.target)) {
            nav.classList.remove('active');
            btn.setAttribute('aria-expanded', 'false');
        }
    });
}

/* 2. Announcement popup (cards carry their data in data-* attributes) */
function initAnnouncementModal() {
    const modal = document.getElementById('announcementModal');
    if (!modal) return;
    const $ = (id) => document.getElementById(id);

    const open = (card) => {
        $('modalTitle').textContent = card.dataset.title;
        $('modalDate').textContent = card.dataset.date;
        $('modalContent').textContent = card.dataset.content;
        const img = $('modalImage');
        if (card.dataset.image) { img.src = card.dataset.image; img.alt = card.dataset.title; img.hidden = false; }
        else { img.hidden = true; img.removeAttribute('src'); }
        modal.hidden = false;
        document.body.style.overflow = 'hidden';
        $('modalClose').focus();
    };
    const close = () => { modal.hidden = true; document.body.style.overflow = ''; };

    document.querySelectorAll('.js-announcement').forEach((card) => {
        card.addEventListener('click', () => open(card));
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(card); }
        });
    });
    $('modalClose').addEventListener('click', close);
    modal.addEventListener('click', (e) => { if (e.target === modal) close(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && !modal.hidden) close(); });
}

/* 3. Admin "Edit" button fills the post form and switches it to update mode */
function initPostEditor() {
    const form = document.getElementById('post-form');
    if (!form) return;
    const $ = (id) => document.getElementById(id);

    const reset = () => {
        $('form-heading').textContent = 'Create New Announcement';
        $('submit-btn').textContent = 'Publish Post';
        $('cancel-edit-btn').hidden = true;
        form.action = form.dataset.storeUrl;
        $('form-method').value = 'POST';
        form.reset();
    };

    document.querySelectorAll('.js-edit-post').forEach((btn) => {
        btn.addEventListener('click', () => {
            const post = JSON.parse(btn.dataset.post);
            $('form-heading').textContent = 'Edit Announcement';
            $('submit-btn').textContent = 'Update Post';
            $('cancel-edit-btn').hidden = false;
            form.action = btn.dataset.updateUrl;
            $('form-method').value = 'PUT';
            $('post-title').value = post.title;
            $('post-content').value = post.content;
            $('post-color').value = post.card_color;
            $('post-published').checked = !!post.is_published;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });
    $('cancel-edit-btn').addEventListener('click', reset);
}
