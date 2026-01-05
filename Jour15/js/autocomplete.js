// Pseudo-code rigoureux
document.getElementById('search-input').addEventListener('keyup', async (e) => {
  const query = e.target.value.trim();
  
  if (query.length < 1) {
      // Masquer suggestions
      return;
  }
  
  // Appel AJAX vers api/autocomplete.php?q=query
  const response = await fetch(`api/autocomplete.php?q=${encodeURIComponent(query)}`);
  const data = await response.json();
  
  // Afficher résultats : exact PUIS partial
  // Insérer séparateur HTML entre les deux
  afficherSuggestions(data);
});

const searchInput = document.getElementById('search-input');
const suggestionsList = document.getElementById('suggestions');

searchInput.addEventListener('keyup', async (e) => {
    const query = searchInput.value.trim();
    
    // Masquer si moins d'un caractère
    if (query.length < 1) {
        suggestionsList.innerHTML = '';
        return;
    }
    
    try {
        const response = await fetch(
            `api/autocomplete.php?q=${encodeURIComponent(query)}`
        );
        const data = await response.json();
        
        displaySuggestions(data.exact, data.partial);
    } catch (error) {
        console.error('Erreur autocomplétion:', error);
    }
});

function displaySuggestions(exact, partial) {
    suggestionsList.innerHTML = '';
    
    if (exact.length === 0 && partial.length === 0) {
        suggestionsList.innerHTML = '<li class="no-results">Aucun résultat</li>';
        return;
    }
    
    // Ajouter résultats EXACTS
    exact.forEach(item => {
        const li = createSuggestionItem(item, 'exact');
        suggestionsList.appendChild(li);
    });
    
    // SÉPARATEUR entre exact et partial
    if (exact.length > 0 && partial.length > 0) {
        const separator = document.createElement('li');
        separator.className = 'suggestions-separator';
        separator.textContent = '───────────────';
        suggestionsList.appendChild(separator);
    }
    
    // Ajouter résultats PARTIELS
    partial.forEach(item => {
        const li = createSuggestionItem(item, 'partial');
        suggestionsList.appendChild(li);
    });
}

function createSuggestionItem(item, type) {
    const li = document.createElement('li');
    li.className = `suggestion-item ${type}`;
    
    const a = document.createElement('a');
    a.href = `element.php?id=${item.id}`;
    a.innerHTML = `<strong>${item.name}</strong> <span class="type">${item.type}</span>`;
    
    li.appendChild(a);
    return li;
}

// Fermer suggestions au clic ailleurs
document.addEventListener('click', (e) => {
    if (e.target !== searchInput) {
        suggestionsList.innerHTML = '';
    }
});
