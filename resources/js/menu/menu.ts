(function () {
    const authButton: HTMLElement | null = document.getElementById('dropdownAvatarNameButton');
    const authDropdown: HTMLElement | null = document.getElementById('dropdownAvatarName');

    function toggleAuthDropdown(): void {
        if (authButton === null || authDropdown === null) {
            return;
        }

        authDropdown.classList.toggle('hidden');
    }

    if (authButton !== null) {
        authButton.addEventListener('click', toggleAuthDropdown);
    }
})();
