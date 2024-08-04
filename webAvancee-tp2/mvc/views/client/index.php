{{ include('layouts/header.php', {title:'Clients'})}}
    <h1>Clients</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Zip Code</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
          {% for client in clients %}
            <tr>
                <td><a href="{{base}}/client/show?id={{client.id}}">{{ client.name }}</a></td>
                <td>{{ client.address }}</td>
                <td>{{ client.phone }}</td>
                <td>{{ client.zip_code }}</td>
                <td>{{ client.email }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
    <div class="buttons">
        <div></div>
        <a href="{{base}}/client/create" class="btn">New Client</a>
    </div>
{{ include('layouts/footer.php')}}