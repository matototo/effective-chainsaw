{{ include('layouts/header.php', {title:'Manufacturers'})}}
    <h1>Manufacturers</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Country of origin</th>
                <th>Year of creation</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
          {% for manufacturer in manufacturers %}
            <tr>
                <td>{{ manufacturer.name }}</a></td>
                <td>{{ manufacturer.address }}</td>
                <td>{{ manufacturer.phone }}</td>
                <td>{{ manufacturer.country_of_origin }}</td>
                <td>{{ manufacturer.year_of_creation }}</td>
                <td>{{ manufacturer.ranking }}</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
{{ include('layouts/footer.php')}}