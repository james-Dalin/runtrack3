// ========== CALENDAR ========== 

let currentDate = new Date();

$(document).ready(function() {
    const currentUser = getCurrentUser();
    
    if (!currentUser) {
        window.location.href = 'index.html';
        return;
    }
    
    $('#userName').text(`${currentUser.fullName}`);
    
    // Render calendar
    renderCalendar();
    loadUserRequests();
    
    // Navigation
    $('#prevMonth').on('click', function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });
    
    $('#nextMonth').on('click', function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });
});

function renderCalendar() {
    const month = currentDate.getMonth();
    const year = currentDate.getFullYear();
    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    
    // Update header
    const monthNames = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    $('#currentMonth').text(`${monthNames[month]} ${year}`);
    
    // Clear grid
    const grid = $('#calendarGrid');
    grid.html('');
    
    // Add day headers
    const dayHeaders = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
    dayHeaders.forEach(day => {
        grid.append(`<div class="calendar-day header-day" style="font-weight: bold; color: #666;">${day}</div>`);
    });
    
    // Add empty days before first day
    for (let i = 0; i < firstDay.getDay() - 1; i++) {
        grid.append('<div class="calendar-day other-month">-</div>');
    }
    
    // Add days of month
    for (let day = 1; day <= lastDay.getDate(); day++) {
        const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
        const date = new Date(year, month, day);
        const isPast = isPastDate(dateStr);
        
        let dayClass = 'calendar-day';
        if (isPast) dayClass += ' past';
        
        const dayEl = $(`<div class="${dayClass}">${day}</div>`);
        
        if (!isPast) {
            dayEl.on('click', function() {
                toggleRequest(dateStr);
                renderCalendar();
            });
        }
        
        grid.append(dayEl);
    }
}

function toggleRequest(dateStr) {
    const currentUser = getCurrentUser();
    const existingRequest = mockData.attendance_requests.find(r => r.userId === currentUser.id && r.date === dateStr);
    
    if (existingRequest) {
        mockData.attendance_requests = mockData.attendance_requests.filter(r => r.id !== existingRequest.id);
        showAlert('Demande supprimée', 'info');
    } else {
        API.createRequest(currentUser.id, dateStr)
            .then(() => {
                showAlert('Demande créée!', 'success');
                loadUserRequests();
            });
    }
}

function loadUserRequests() {
    const currentUser = getCurrentUser();
    
    API.getMyRequests(currentUser.id)
        .then(requests => {
            const container = $('#requestsList');
            container.html('');
            
            if (requests.length === 0) {
                container.html('<p class="text-muted">Aucune demande pour le moment</p>');
                return;
            }
            
            requests.forEach(req => {
                const statusBadge = req.status === 'pending' ? 'warning' : req.status === 'approved' ? 'success' : 'danger';
                const statusText = req.status === 'pending' ? 'En attente' : req.status === 'approved' ? 'Acceptée' : 'Refusée';
                
                const html = `
                    <div class="request-card card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-1 fw-bold">${formatDate(req.date)}</p>
                                    <small class="text-muted">Demandée le ${formatDate(req.requestedAt)}</small>
                                </div>
                                <span class="badge bg-${statusBadge}">${statusText}</span>
                            </div>
                        </div>
                    </div>
                `;
                
                container.append(html);
            });
        });
}
