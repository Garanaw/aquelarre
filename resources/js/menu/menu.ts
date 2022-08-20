(function () {
    const authButton: HTMLElement | null = document.getElementById('dropdownAvatarNameButton');
    const authDropdown: HTMLElement | null = document.getElementById('dropdownAvatarName');
    const logoutLink: HTMLElement | null = document.getElementById('logout-link');
    const logoutForm: HTMLFormElement | null = document.getElementById('logout-form') as HTMLFormElement | null;

    function toggleAuthDropdown(): void {
        if (authButton === null || authDropdown === null) {
            return;
        }

        authDropdown.classList.toggle('hidden');
    }

    function logout(): void {
        if (logoutForm instanceof HTMLFormElement) {
            logoutForm.submit();
        }
    }

    if (authButton !== null) {
        authButton.addEventListener('click', toggleAuthDropdown);
    }

    if (logoutLink !== null) {
        logoutLink.addEventListener('click', logout);
    }
})();
