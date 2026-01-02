// ========== MAIN BACKOFFICE LOGIC ========== 

$(document).ready(function() {
    const currentUser = getCurrentUser();
    
    if (!currentUser || (currentUser.role !== 'moderator' && currentUser.role !== 'admin')) {
        window.location.href = 'index.html';
        return;
    }
    
    $('#userName').text(`${currentUser.fullName} (${currentUser.role === 'admin' ? 'Administrateur' : 'Modérateur'})`);
    
    // Show admin tab if admin
    if (currentUser.role === 'admin') {
        $('#adminTabItem').show();
    }
    
    loadStatistics();
    loadRequests();
    
    if (currentUser.role === 'admin') {
        loadManagement();
    }
});

function loadStatistics() {
    const pending = mockData.attendance_requests.filter(r => r.status === 'pending').length;
    const approved = mockData.attendance_requests.filter(r => r.status === 'approved').length;
    const rejected = mockData.attendance_requests.filter(r => r.status === 'rejected').length;
    const total = mockData.users.filter(u => u.role === 'student').length;
    
    $('#totalStudents').text(total);
    $('#pendingRequests').text(pending);
    $('#approvedRequests').text(approved);
    $('#rejectedRequests').text(rejected);
}

function loadRequests() {
    API.getAllRequests()
        .then(requests => {
            const users = mockData.users;
            
            // Pending
            const pendingReqs = requests.filter(r => r.status === 'pending');
            renderRequestList(pendingReqs, users, '#pendingList', true);
            
            // Approved
            const approvedReqs = requests.filter(r => r.status === 'approved');
            renderRequestList(approvedReqs, users, '#approvedList', false);
            
            // Rejected
            const rejectedReqs = requests.filter(r => r.status === 'rejected');
            renderRequestList(rejectedReqs, users, '#rejectedList', false);
        });
}

function renderRequestList(requests, users, containerId, showActions) {
    const container = $(containerId);
    container.html('');
    
    if (requests.length === 0) {
        container.html('<p class="text-muted">Aucune demande</p>');
        return;
    }
    
    requests.forEach(req => {
        const user = users.find(u => u.id === req.userId);
        const html = `
            <div class="request-item">
                <div class="request-header">
                    <div>
                        <p class="request-name">${user?.fullName}</p>
                        <p class="request-date">${formatDate(req.date)}</p>
                    </div>
                    ${showActions ? `
                        <div class="request-actions">
                            <button class="btn btn-sm btn-success" onclick="approveRequest(${req.id})">
                                <i class="fas fa-check"></i> Accepter
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="rejectRequest(${req.id})">
                                <i class="fas fa-times"></i> Refuser
                            </button>
                        </div>
                    ` : ''}
                </div>
            </div>
        `;
        container.append(html);
    });
}

function approveRequest(requestId) {
    API.approveRequest(requestId)
        .then(() => {
            showAlert('Demande acceptée!', 'success');
            loadStatistics();
            loadRequests();
        });
}

function rejectRequest(requestId) {
    API.rejectRequest(requestId)
        .then(() => {
            showAlert('Demande refusée!', 'danger');
            loadStatistics();
            loadRequests();
        });
}

function loadManagement() {
    const currentUser = getCurrentUser();
    
    if (currentUser.role !== 'admin') return;
    
    const moderators = mockData.users.filter(u => u.role === 'moderator');
    const admins = mockData.users.filter(u => u.role === 'admin');
    
    // Moderators
    const modList = $('#moderatorsList');
    modList.html('');
    moderators.forEach(mod => {
        modList.append(`
            <div class="user-item">
                <div class="user-info">
                    <p class="user-name">${mod.fullName}</p>
                    <p class="user-email">${mod.email}</p>
                </div>
                <button class="btn btn-sm btn-danger" onclick="removeRole(${mod.id}, 'student')">
                    <i class="fas fa-trash"></i> Retirer
                </button>
            </div>
        `);
    });
    
    // Admins
    const adminList = $('#adminsList');
    adminList.html('');
    admins.forEach(admin => {
        adminList.append(`
            <div class="user-item">
                <div class="user-info">
                    <p class="user-name">${admin.fullName}</p>
                    <p class="user-email">${admin.email}</p>
                </div>
                ${admin.id !== currentUser.id ? `
                    <button class="btn btn-sm btn-danger" onclick="removeRole(${admin.id}, 'moderator')">
                        <i class="fas fa-trash"></i> Retirer
                    </button>
                ` : '<span class="badge bg-primary">Vous</span>'}
            </div>
        `);
    });
}

function removeRole(userId, newRole) {
    const user = mockData.users.find(u => u.id === userId);
    if (user) {
        user.role = newRole;
        showAlert(`Rôle changé en ${newRole}`, 'success');
        loadManagement();
    }
}
