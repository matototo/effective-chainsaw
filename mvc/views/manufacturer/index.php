{{ include('layouts/header.php', {title:'Manufacturers'})}}
    <h1>Manufacturers</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
          {% for manufacturer in manufacturers %}
            <tr>
                <td><a href="{{base}}/manufacturer/show?id={{manufacturer.id}}">{{ manufacturer.name }}</a></td>
                <td>{{ manufacturer.phone }}</td>
                <td>{{ manufacturer.ranking }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
{{ include('layouts/footer.php')}}