    document.getElementById('delete-student').addEventListener('click', async function() {
        const confirmed = await confirmModal({
            type: 'danger',
            title: 'Supprimer cet étudiant ?',
            message: 'Cette action est irréversible. Toutes les données de {{ $etudiant->prenom }} {{ $etudiant->nom }} seront définitivement supprimées.',
            confirmText: 'Oui, supprimer',
            cancelText: 'Annuler'
        });

        if (confirmed) {
            // Créer et soumettre le formulaire
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("etudiants.destroy", $etudiant->id) }}';

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';

            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    });
