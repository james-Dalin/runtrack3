// ========== MOCK API (Simulation JSON) ========== 

const mockData = {
    users: [
        {
            id: 1,
            email: "alice@laplateforme.com",
            password: "password123",
            fullName: "Alice Dupont",
            role: "student"
        },
        {
            id: 2,
            email: "bob@laplateforme.com",
            password: "password123",
            fullName: "Bob Martin",
            role: "moderator"
        },
        {
            id: 3,
            email: "admin@laplateforme.com",
            password: "password123",
            fullName: "Admin Admin",
            role: "admin"
        }
    ],
    
    attendance_requests: [
        {
            id: 1,
            userId: 1,
            date: "2026-01-15",
            status: "pending",
            requestedAt: "2026-01-02T10:30:00Z"
        },
        {
            id: 2,
            userId: 1,
            date: "2026-01-20",
            status: "approved",
            requestedAt: "2026-01-02T09:15:00Z"
        },
        {
            id: 3,
            userId: 2,
            date: "2026-01-15",
            status: "rejected",
            requestedAt: "2025-12-30T14:00:00Z"
        }
    ]
};

// API Methods
const API = {
    // Auth
    login: function(email, password) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                const user = mockData.users.find(u => u.email === email && u.password === password);
                if (user) {
                    resolve({ success: true, user: user });
                } else {
                    reject({ success: false, message: "Email ou mot de passe incorrect" });
                }
            }, 500);
        });
    },
    
    register: function(email, password, fullName) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                if (mockData.users.find(u => u.email === email)) {
                    reject({ success: false, message: "Cet email est déjà utilisé" });
                } else {
                    const newUser = {
                        id: mockData.users.length + 1,
                        email,
                        password,
                        fullName,
                        role: "student"
                    };
                    mockData.users.push(newUser);
                    resolve({ success: true, user: newUser });
                }
            }, 500);
        });
    },
    
    // Attendance Requests
    getMyRequests: function(userId) {
        return new Promise((resolve) => {
            setTimeout(() => {
                const requests = mockData.attendance_requests.filter(r => r.userId === userId);
                resolve(requests);
            }, 300);
        });
    },
    
    createRequest: function(userId, date) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                const existing = mockData.attendance_requests.find(r => r.userId === userId && r.date === date);
                if (existing) {
                    reject({ success: false, message: "Vous avez déjà une demande pour cette date" });
                } else {
                    const newRequest = {
                        id: Math.max(...mockData.attendance_requests.map(r => r.id)) + 1,
                        userId,
                        date,
                        status: "pending",
                        requestedAt: new Date().toISOString()
                    };
                    mockData.attendance_requests.push(newRequest);
                    resolve(newRequest);
                }
            }, 300);
        });
    },
    
    approveRequest: function(requestId) {
        return new Promise((resolve) => {
            setTimeout(() => {
                const request = mockData.attendance_requests.find(r => r.id === requestId);
                if (request) {
                    request.status = "approved";
                }
                resolve(request);
            }, 300);
        });
    },
    
    rejectRequest: function(requestId) {
        return new Promise((resolve) => {
            setTimeout(() => {
                const request = mockData.attendance_requests.find(r => r.id === requestId);
                if (request) {
                    request.status = "rejected";
                }
                resolve(request);
            }, 300);
        });
    },
    
    getAllRequests: function() {
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve(mockData.attendance_requests);
            }, 300);
        });
    },
    
    getUsers: function() {
        return new Promise((resolve) => {
            setTimeout(() => {
                resolve(mockData.users);
            }, 300);
        });
    }
};
