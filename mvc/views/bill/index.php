{{ include('layouts/header.php', {title:'Bills'})}}
    <h1>Automobile Bills</h1>
    <table>
        <thead>
            <tr>
                <th>Bill number</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
          {% for bill in bills %}
            <tr>
                <td>{{ bill.bill_number }}</td>
                <td>{{ bill.total }}</td>

            </tr>
          {% endfor %}
        </tbody>
    </table>
    <a href="{{base}}/bill/create" class="btn">New Bill</a>
{{ include('layouts/footer.php')}}