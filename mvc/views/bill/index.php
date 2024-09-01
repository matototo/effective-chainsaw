{{ include('layouts/header.php', {title:'Bills'})}}
    <h1>Bills</h1>
    <table>
        <thead>
            <tr>
                <th class="bill">Bill number</th>
                <th>Car</th>
                <th class="qt">Quantity</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
          {% for bill in bills %}
            <tr>
                <td><a href="{{base}}/bill/show?id={{bill.id}}" class="billnumber"># {{ bill.id}}</a></td>
                <td>
                    {% for car in cars %}
                        {% if bill.serial_number == car.serial_number %}
                            <a href="{{base}}/automobile/show?serial_number={{ bill.serial_number }}">{{ car.name }}</a>
                        {% endif %}
                    {% endfor %}
                </td>
                <td>
                    {{ bill.qt }}
                </td>
                <td class="money">{{ bill.total }} $</td>
            </tr>
          {% endfor %}
        </tbody>
    </table>
    <div class="buttons">
        <a href="{{base}}/client" class="btn back">Back</a>
        {% if session.privilege_id == 1 %}
        <a href="{{base}}/bill/create" class="btn">New Bill</a>
        {% endif %}
    </div>
{{ include('layouts/footer.php')}}