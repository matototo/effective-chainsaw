{{ include('layouts/header.php', {title:'Logbook'})}}

    <div class="container">

        {% if errors is defined %}
        <div class="error">
        <ul>
        {% for error in errors %}
            <li>{{ error }}</li>        
        {% endfor %}
        </ul>
        </div>
        {% endif %}
        <h1>Logbook</h1>
    <table>
        <thead>
            <tr>
                <th>Page</th>
                <th>User</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            {% for log in log %}
                
                <tr>
                    <td>{{ log.page }}</td>
                    <td>
                    {% for user in users %}
                        {% if user.id == log.user_id %}
                            {{ user.name }}
                        {% endif %}
                    {% endfor %}
                    </td>
                    <td>{{ log.create_at }}</td>
                </tr>
                
            {% endfor %}
            
        </tbody>
    </table>
    </div>
{{ include ('layouts/footer.php')}}