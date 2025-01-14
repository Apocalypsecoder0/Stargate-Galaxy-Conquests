document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');
    const dashboard = document.getElementById('dashboard');
    const resources = document.getElementById('resources');

    // Handle registration
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        const response = await fetch('register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username, password }),
        });

        const result = await response.json();
        alert(result.message);
    });

    // Handle login
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const username = document.getElementById('loginUsername').value;
        const password = document.getElementById('loginPassword').value;

        const response = await fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ username, password }),
        });

        const result = await response.json();
        alert(result.message);

        if (result.success) {
            // Hide login/register and show dashboard
            document.getElementById('register').style.display = 'none';
            document.getElementById('login').style.display = 'none';
            dashboard.style.display = 'block';

            // Fetch resources
            fetchResources();
        }
    });

    // Fetch resources
    async function fetchResources() {
        const response = await fetch('get_resources.php');
        const data = await response.json();
        document.getElementById('metal').innerText = `Metal: ${data.metal}`;
        document.getElementById('crystal').innerText = `Crystal: ${data.crystal}`;
        document.getElementById('deuterium').innerText = `Deuterium: ${data.deuterium}`;
    }

    // Handle building construction
    document.getElementById('constructBuilding').addEventListener('click', async () => {
        const buildingType = document.getElementById('buildingSelect').value;

        const response = await fetch('construct_building.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ buildingType }),
        });

        const result = await response.json();
        alert(result.message);
        fetchResources(); // Refresh resources after construction
    });
});
